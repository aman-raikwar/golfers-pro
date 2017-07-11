<?php

namespace app\controllers;

use Yii;
use app\models\User;
use app\models\Golfer;
use app\models\GolferSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\widgets\ActiveForm;

/**
 * GolferController implements the CRUD actions for Golfer model.
 */
class GolferController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Golfer models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new GolferSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Golfer model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Golfer model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Golfer();

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
                    \Yii::$app->session->setFlash('type', 'success');
                    \Yii::$app->session->setFlash('title', 'Golfer');
                    \Yii::$app->session->setFlash('message', 'Golfer added successfully.');
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
        }

        return $this->renderAjax('_form', ['model' => $model]);
    }

    /**
     * Updates an existing Golfer model.
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

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            $model->user->user_email = $model->user_email;
            $model->user->user_username = $model->user_username;
            $model->user->setPassword($model->user_password);
            $model->user->generateAuthKey();

            if ($model->save() && $model->user->save()) {

                \Yii::$app->session->setFlash('type', 'success');
                \Yii::$app->session->setFlash('title', 'Golfer');
                \Yii::$app->session->setFlash('message', 'Golfer updated successfully.');

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
     * Deletes an existing Golfer model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $model = $this->findModel($id);

        if (!empty($model)) {
            if ($model->delete() && $model->user->delete()) {
                \Yii::$app->session->setFlash('type', 'success');
                \Yii::$app->session->setFlash('title', 'Golfer');
                \Yii::$app->session->setFlash('message', 'Golfer deleted successfully.');
            } else {
                \Yii::$app->session->setFlash('type', 'danger');
                \Yii::$app->session->setFlash('title', 'Golfer');
                \Yii::$app->session->setFlash('message', 'Unable to delete this Golfer!');
            }
        } else {
            \Yii::$app->session->setFlash('type', 'danger');
            \Yii::$app->session->setFlash('title', 'Golfer');
            \Yii::$app->session->setFlash('message', 'No Golfer found!');
        }

        return $this->redirect(['index']);
    }

    /**
     * Finds the Golfer model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Golfer the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Golfer::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
