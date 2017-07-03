<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\GolferRegitration;
use app\models\Country;
use yii\widgets\ActiveForm;

class SiteController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                        [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
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
            return $this->redirect('golf-clubs');
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post())) {
            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ActiveForm::validate($model);
            }
            if ($model->login()) {
                return $this->redirect('golf-clubs');
            }
        }
        $this->layout = 'frontend';
        return $this->render('login', [
                    'model' => $model,
        ]);
    }

//    public function actionLists($id) {
//        if (Yii::$app->request->isAjax) {
//            if ($id == 1) {
//                $posts = \app\models\GolfCourse::find()->asArray()->all();
//                if (count($posts) > 0) {
//                    foreach ($posts as $post) {
//                        echo "<option value='" . $post['ID'] . "'>" . $post['Name'] . "</option>";
//                    }
//                } else {
//                    echo "<option>-</option>";
//                }
//            } else {
//                echo "<option>-</option>";
//            }
//        }
//    }

    public function actionRegister() {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new GolferRegitration();
        $this->layout = 'frontend';

        if ($model->load(Yii::$app->request->post())) {
            $model->setPassword($model->password);
            $model->generateAuthKey();

            if ($model->save()) {
//        $mail = Yii::$app->mailer->compose()
//                ->setFrom(['aman.btech12@gmail.com' => 'Aman Raikwar'])
//                ->setTo(['amanraikwar@mailinator.com'])
//                ->setSubject('Mail from Golfer Website')
//                ->setHtmlBody('This is my simple message for the User')
//                ->send();
//        print_r($mail);
//        die;
                Yii::$app->session->setFlash('success', $model->ID);
                return $this->redirect('golfer-registration');
            }
        }

        return $this->render('register', ['model' => $model,]);
    }

    public function actionRegistration() {
        $model = new GolferRegitration();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {
                // form inputs are valid, do something here
                return;
            }
        }
        $this->layout = 'frontend';
        return $this->render('registration', [
                    'model' => $model,
        ]);
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

}
