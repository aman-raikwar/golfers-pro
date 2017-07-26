<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\Response;
use yii\widgets\ActiveForm;
use app\models\User;
use app\models\Country;
use app\models\LoginForm;
use app\models\Golfer;
use app\models\ContactForm;
use app\models\PasswordResetRequestForm;
use app\models\ResetPasswordForm;
use app\models\CardMembershipCategory;
use app\models\Playeractivity;
use app\models\CardReaders;

class SiteController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index'],
                'rules' => [
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['login', 'register'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function beforeAction($action) {
        if (parent::beforeAction($action)) {
            if ($action->id == 'account-verification') {
                Yii::$app->user->logout(true);
            }
            // change layout for error action
            if ($action->id == 'error') {
                $this->layout = 'frontend';
            }
            return true;
        } else {
            return false;
        }
    }

    /**
     * @inheritdoc
     */
    public function actions() {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex() {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin() {
        if (!Yii::$app->user->isGuest) {
            return $this->redirect(['playeractivity/index']);
        }

        $this->layout = 'frontend';
        $model = new LoginForm();

        if ($model->load(Yii::$app->request->post())) {
            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ActiveForm::validate($model);
            }

            if ($model->login()) {
                return $this->redirect(['playeractivity/index']);
            }
        }

        return $this->render('login', ['model' => $model]);
    }

    public function actionRegister() {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $this->layout = 'frontend';
        $model = new Golfer();
        $model->setScenario('register');

        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            $model->golfer_dateOfBirth = date('Y-m-d', strtotime($model->golfer_dateOfBirth));

            $user = new User();
            $user->user_username = $model->user_username;
            $user->user_email = $model->user_email;
            $user->setPassword($model->user_password);
            $user->generateAuthKey();
            $user->user_roleID = 2;

            if ($user->save()) {
                //$model->golfer_opgRegType = $_POST['Golfer']['golfer_opgRegType'];
                $model->golfer_opgRegType = 1;
                $model->golfer_userID = $user->user_id;
                if ($model->save(false)) {

                    Yii::$app
                            ->mailer
                            //->compose(['html' => 'accountVerification-html', 'text' => 'accountVerification-text'], ['user' => $user])
                            ->compose(['html' => 'welcomeGolferEmail-html', 'text' => 'welcomeGolferEmail-text'], ['user' => $user, 'golfer' => $model])
                            ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name])
                            ->setTo($user->user_email)
                            ->setSubject('Account Verification Link for ' . Yii::$app->name)
                            ->send();

                    Yii::$app->session->setFlash('success', 'done');
                    return $this->redirect('golfer-registration');
                } else {
//                    echo 'Second';
//                    print_r($user->getErrors());
//                    print_r($model->getErrors());
//                    die;
                }
            } else {
//                echo 'First';
//                print_r($user->getErrors());
//                print_r($model->getErrors());
//                die;
            }
        }

        return $this->render('register', ['model' => $model]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout() {
        Yii::$app->user->logout();
        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact() {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
                    'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout() {
        return $this->render('about');
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset() {
        $this->layout = 'frontend';
        $model = new PasswordResetRequestForm();

        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $flag = 1;
            $selectUser = 0;
            if ($model->request_type == 1) {
                if (isset($_POST['selectedUser']) && !empty($_POST['selectedUser']) && $_POST['selectedUser'] > 0) {
                    $selectUser = $_POST['selectedUser'];
                } else {
                    $usersFromEmail = User::find()->where(['status' => User::STATUS_ACTIVE, 'user_email' => $model->user_email])->asArray()->all();
                    if (count($usersFromEmail) > 1) {
                        $flag = 0;
                        return $this->render('requestPasswordResetToken', ['model' => $model, 'users' => $usersFromEmail]);
                    }
                }
            }

            if ($flag == 1) {
                if ($model->sendEmail($selectUser)) {
                    Yii::$app->session->setFlash('success', 'Check your email for further instructions.');
                    return $this->refresh();
                } else {
                    Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
                }
            }
        } else {
            //print_r($model->getErrors());
        }

        return $this->render('requestPasswordResetToken', ['model' => $model]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token) {
        $this->layout = 'frontend';

        Yii::$app->user->logout();

        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password was saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', ['model' => $model]);
    }

    public function actionAccountVerification($token) {
        $this->layout = 'frontend';

        Yii::$app->user->logout();

        if (!empty($token)) {
            $user = User::find()->where(['user_auth_key' => $token, 'status' => 0])->one();
            if (!empty($user)) {

                $golfer = Golfer::findOne(['golfer_userID' => $user->user_id]);
                if (!empty($golfer)) {
                    $club = \app\models\GolfClub::find()->where(['golfclub_id' => $golfer->golfer_firstClubID])->one();
                    if (!empty($club)) {
                        $card = \app\models\RegistrationCards::find()->where(['ClubID' => $club->golfclub_id, 'UserID' => 0])->one();
                        if (!empty($card)) {
                            $card->UserID = $golfer->golfer_id;
                            $card->RegisteredDate = date('Y-m-d');
                            $card->save(false);
                        }
                    }
                }

                $user->status = 1;
                $user->save();

                Yii::$app->session->setFlash('success', 'Your account is verified successfully.');
            } else {
                Yii::$app->session->setFlash('warning', 'Your account verification failed. Contact Site Administrator.');
            }
        } else {
            Yii::$app->session->setFlash('danger', 'Account Verification Token is required');
        }

        return $this->render('confirmation');
    }

    public function actionNoAccess() {
        $this->layout = 'frontend';
        return $this->render('no-access');
    }

    public function actionRunCron() {
        $this->layout = false;

        $sql = "SELECT playeractivity.ID, playeractivity.CardID, card_readers.GolfCourse, playeractivity.Date FROM playeractivity join card_readers on playeractivity.ReaderID=card_readers.ID ORDER by playeractivity.CardID, playeractivity.Date";
        $connection = Yii::$app->getDb();
        $command = $connection->createCommand($sql);
        $activities = $command->queryAll();

        if (!empty($activities)) {
            $oldActivity = [];
            $curActivity = [];

            foreach ($activities as $activity) {
//                echo $activity['ID'] . '  ----  ' . $activity['CardID'] . '  ----  ' . $activity['GolfCourse'] . '  ----  ' . $activity['Date'];
//                echo '<hr/>';

                if (empty($oldActivity)) {
                    $oldActivity = $activity;
                }

                if (empty($curActivity)) {
                    $curActivity = $activity;
                } else {
                    //if ($curActivity['Date'])
                    $curActivity = $activity;
                    if ($oldActivity['CardID'] == $curActivity['CardID'] && $oldActivity['GolfCourse'] == $curActivity['GolfCourse']) {
                        $time_one = new \DateTime($oldActivity['Date']);
                        $time_two = new \DateTime($curActivity['Date']);
                        $difference = $time_one->diff($time_two);
//                        echo '<br/>-------------------------------------------------------------<br/>';
                        $hours = $difference->h;
                        $hours = $hours + ($difference->days * 24);
//                        echo $hours;
//                        echo '<pre>';
//                        print_r($difference);
//                        echo '</pre>';
//                        echo '<br/>-------------------------------------------------------------<br/>';

                        if ($hours < 3) {
                            if (Playeractivity::findOne($curActivity['ID'])->delete()) {
                                $oldActivity = $curActivity;
                            }
                        }
                    } else {
                        $curActivity = [];
                        $oldActivity = [];
                    }
                }
            }
        }
    }

}
