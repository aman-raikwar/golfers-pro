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
                            ->compose(['html' => 'accountVerification-html', 'text' => 'accountVerification-text'], ['user' => $user])
                            ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name . ' robot'])
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
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password was saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
                    'model' => $model,
        ]);
    }

    public function actionAccountVerification($token) {
        $this->layout = 'frontend';

        if (!empty($token)) {
            $user = User::find()->where(['user_auth_key' => $token, 'status' => 0])->one();
            if (!empty($user)) {
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

}
