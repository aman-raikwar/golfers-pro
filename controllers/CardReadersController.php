<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use app\models\CardReaders;
use app\models\CardReadersSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\widgets\ActiveForm;

/**
 * CardReadersController implements the CRUD actions for CardReaders model.
 */
class CardReadersController extends Controller {

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
     * Lists all CardReaders models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new CardReadersSearch();
        $data = $searchModel->getAll();

        return $this->render('index', ['data' => $data]);
    }

    /**
     * Displays a single CardReaders model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new CardReaders model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new CardReaders();

        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }

        if ($model->load(Yii::$app->request->post())) {

            if ($model->save()) {
                \Yii::$app->session->setFlash('type', 'success');
                \Yii::$app->session->setFlash('title', 'Card Readers');
                \Yii::$app->session->setFlash('message', 'Reader added successfully.');
            } else {
                \Yii::$app->session->setFlash('type', 'danger');
                \Yii::$app->session->setFlash('title', 'Card Readers');
                \Yii::$app->session->setFlash('message', 'Reader not added.');
            }

            return $this->redirect(['index']);
        } else {
            return $this->renderAjax('_form', ['model' => $model]);
        }
    }

    /**
     * Updates an existing CardReaders model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }

        if ($model->load(Yii::$app->request->post())) {

            if ($model->save()) {
                \Yii::$app->session->setFlash('type', 'success');
                \Yii::$app->session->setFlash('title', 'Card Readers');
                \Yii::$app->session->setFlash('message', 'Reader updated successfully.');
            } else {
                \Yii::$app->session->setFlash('type', 'danger');
                \Yii::$app->session->setFlash('title', 'Card Readers');
                \Yii::$app->session->setFlash('message', 'Reader not updated.');
            }

            return $this->redirect(['index']);
        } else {
            return $this->renderAjax('_form', ['model' => $model]);
        }
    }

    /**
     * Deletes an existing CardReaders model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $model = $this->findModel($id);

        if ($model->delete()) {
            \Yii::$app->session->setFlash('type', 'success');
            \Yii::$app->session->setFlash('title', 'Card Readers');
            \Yii::$app->session->setFlash('message', 'Reader deleted successfully.');
        } else {
            \Yii::$app->session->setFlash('type', 'success');
            \Yii::$app->session->setFlash('title', 'Card Readers');
            \Yii::$app->session->setFlash('message', 'Reader not deleted.');
        }

        return $this->redirect(['index']);
    }

    /**
     * Finds the CardReaders model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CardReaders the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = CardReaders::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
