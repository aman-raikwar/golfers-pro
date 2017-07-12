<?php

namespace app\controllers;

use Yii;
use app\models\RegistrationCards;
use app\models\RegistrationCardsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\widgets\ActiveForm;

/**
 * RegistrationCardsController implements the CRUD actions for RegistrationCards model.
 */
class RegistrationCardsController extends Controller {

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
     * Lists all RegistrationCards models.
     * @return mixed
     */
    public function actionIndex() {

        $searchModel = new RegistrationCardsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single RegistrationCards model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new RegistrationCards model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new RegistrationCards();

        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            $firstcard_number = $model->firstcard_number;
            $lastcard_number = $model->lastcard_number;

            $firstcard_value = intval(preg_replace('/[^0-9]+/', '', $firstcard_number));
            $lastcard_value = intval(preg_replace('/[^0-9]+/', '', $lastcard_number));

            $firstcard_string = strtoupper(str_replace($firstcard_value, '', $firstcard_number));
            $lastcard_string = strtoupper(str_replace($lastcard_value, '', $lastcard_number));

//            if ($firstcard_string != $lastcard_string) {
//                Yii::$app->response->format = Response::FORMAT_JSON;
//                return ActiveForm::validate($model);
//            }

            $flag = 0;
            for ($i = $firstcard_value; $i <= $lastcard_value; $i++) {
                //$model = new RegistrationCards();
                $oldModel = RegistrationCards::findOne(['CardNumber' => $firstcard_string . $i]);
                if (empty($oldModel)) {
                    $model->ID = NULL;
                    $model->CardNumber = $firstcard_string . $i;
                    $model->ClubID = $model->ClubID;
                    $model->UserID = 0;
                    $model->RegisteredDate = date('Y-m-d');
                    $model->isNewRecord = TRUE;
                    $model->save();
                    $flag = 1;
                }
            }

            if ($flag == 1) {
                \Yii::$app->session->setFlash('type', 'success');
                \Yii::$app->session->setFlash('title', 'Golfer Cards');
                \Yii::$app->session->setFlash('message', 'Golfer Card added successfully.');
            } else {
                \Yii::$app->session->setFlash('type', 'danger');
                \Yii::$app->session->setFlash('title', 'Golfer Cards');
                \Yii::$app->session->setFlash('message', 'All Cards already exists.');
            }
            return $this->redirect(['index']);
        }

        return $this->renderAjax('_form', ['model' => $model]);
    }

    public function actionAddnew() {
        $model = new RegistrationCards();
        $data = $model->demoInsert();
    }

    /**
     * Updates an existing RegistrationCards model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ID]);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing RegistrationCards model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the RegistrationCards model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return RegistrationCards the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = RegistrationCards::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
