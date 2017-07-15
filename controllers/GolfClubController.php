<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use app\models\User;
use app\models\GolfClub;
use app\models\GolfClubSearch;
use app\models\County;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\web\UploadedFile;

/**
 * GolfClubController implements the CRUD actions for GolfClub model.
 */
class GolfClubController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all GolfClub models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new GolfClubSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single GolfClub model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new GolfClub model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new GolfClub();
        $model->setScenario('create');

        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            $clubLogo = UploadedFile::getInstance($model, 'golfclub_logo');
            if (!empty($clubLogo)) {
                $ClubLogoFileName = date('YmdHis') . '_' . $clubLogo->baseName . '.' . $clubLogo->extension;
                $ClubLogoFilePath = 'uploads/' . $ClubLogoFileName;
                $clubLogo->saveAs($ClubLogoFilePath);
                $model->golfclub_logo = $ClubLogoFileName;
            }

            if (!empty($_POST['GolfClub']['golfclub_facilities'])) {
                $model->golfclub_facilities = implode(',', $_POST['GolfClub']['golfclub_facilities']);
            }

            $user = new User();
            $user->user_username = $model->user_username;
            $user->user_email = $model->user_email;
            $tempPassword = $model->user_password;
            $user->setPassword($model->user_password);
            $user->generateAuthKey();
            $user->user_roleID = 3;
            $user->status = 1;

            if ($user->save()) {
                $model->golfclub_userID = $user->user_id;
                if ($model->save(false)) {

                    Yii::$app
                            ->mailer
                            ->compose(['html' => 'golfClubCredentials-html', 'text' => 'golfClubCredentials-text'], ['user' => $user, 'tempPassword' => $tempPassword])
                            ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name . ' robot'])
                            ->setTo($user->user_email)
                            ->setSubject('Golf Club Credentials for ' . Yii::$app->name)
                            ->send();

                    \Yii::$app->session->setFlash('type', 'success');
                    \Yii::$app->session->setFlash('title', 'Golf Club');
                    \Yii::$app->session->setFlash('message', 'Golf Club added successfully.');

                    return $this->redirect(['index']);
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
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ActiveForm::validate($model);
            }
        } else {
            return $this->renderAjax('_form', ['model' => $model]);
        }
    }

    /**
     * Updates an existing GolfClub model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        $model->user_email = $model->user->user_email;
        $model->user_username = $model->user->user_username;

        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }

        $oldClubLogo = $model->golfclub_logo;

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            $model->user->user_email = $model->user_email;
            $model->user->user_username = $model->user_username;
            $model->user->setPassword($model->user_password);
            $model->user->generateAuthKey();

            $clubLogo = UploadedFile::getInstance($model, 'golfclub_logo');
            if (!empty($clubLogo)) {
                $ClubLogoFileName = date('YmdHis') . '_' . $clubLogo->baseName . '.' . $clubLogo->extension;
                $ClubLogoFilePath = 'uploads/' . $ClubLogoFileName;
                $clubLogo->saveAs($ClubLogoFilePath);
                $model->golfclub_logo = $ClubLogoFileName;
            } else {
                $model->golfclub_logo = $oldClubLogo;
            }

            if (!empty($_POST['GolfClub']['golfclub_facilities'])) {
                $model->golfclub_facilities = implode(',', $_POST['GolfClub']['golfclub_facilities']);
            }

//            print_r($_POST);
//            print_r($_FILES);
//            print_r($model->attributes);
//            die;

            if ($model->save() && $model->user->save()) {

                \Yii::$app->session->setFlash('type', 'success');
                \Yii::$app->session->setFlash('title', 'Golf Club');
                \Yii::$app->session->setFlash('message', 'Golf Club updated successfully.');

                return $this->redirect(['index']);
            } else {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ActiveForm::validate($model);
            }
        } else {
            return $this->renderAjax('_form', ['model' => $model]);
        }
    }

    /**
     * Deletes an existing GolfClub model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $model = $this->findModel($id);

        if (!empty($model)) {
            if ($model->delete() && $model->user->delete()) {
                \Yii::$app->session->setFlash('type', 'success');
                \Yii::$app->session->setFlash('title', 'Golf Club');
                \Yii::$app->session->setFlash('message', 'Golf Club deleted successfully.');
            } else {
                \Yii::$app->session->setFlash('type', 'danger');
                \Yii::$app->session->setFlash('title', 'Golf Club');
                \Yii::$app->session->setFlash('message', 'Unable to delete this Golf Club!');
            }
        } else {
            \Yii::$app->session->setFlash('type', 'danger');
            \Yii::$app->session->setFlash('title', 'Golf Club');
            \Yii::$app->session->setFlash('message', 'No Golf Club found!');
        }

        return $this->redirect(['index']);
    }

    /**
     * Finds the GolfClub model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return GolfClub the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = GolfClub::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionCountyList($id) {
        $counties = County::find()->where('country_id = :country_id', [':country_id' => $id])->orderby('name')->all();
        $response = array('status' => false);
        if (!empty($counties)) {
            $countyList = ArrayHelper::map($counties, 'id', 'name');
            $response = array('status' => true, 'counties' => $countyList);
        }

        echo json_encode($response);
        exit();
    }

}
