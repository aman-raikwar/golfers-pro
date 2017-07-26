<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use app\models\Playeractivity;
use app\models\PlayeractivitySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\widgets\ActiveForm;

/**
 * PlayeractivityController implements the CRUD actions for Playeractivity model.
 */
class PlayeractivityController extends Controller {

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
     * Lists all Playeractivity models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new PlayeractivitySearch();
        $data = $searchModel->getAll();

        return $this->render('index', ['data' => $data]);
    }

    /**
     * Displays a single Playeractivity model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Playeractivity model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Playeractivity();

        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }

        if ($model->load(Yii::$app->request->post())) {
            $model->Date = date('Y-m-d H:i:s', strtotime("$model->activity_date $model->activity_time"));
            if ($model->save()) {
                \Yii::$app->session->setFlash('type', 'success');
                \Yii::$app->session->setFlash('title', 'Golfer Activity');
                \Yii::$app->session->setFlash('message', 'Activity added successfully.');
            } else {
                \Yii::$app->session->setFlash('type', 'danger');
                \Yii::$app->session->setFlash('title', 'Golfer Activity');
                \Yii::$app->session->setFlash('message', 'Activity not added.');
            }

            return $this->redirect(['index']);
        } else {
            return $this->renderAjax('_form', ['model' => $model]);
        }
    }

    /**
     * Updates an existing Playeractivity model.
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
     * Deletes an existing Playeractivity model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Playeractivity model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Playeractivity the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Playeractivity::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionGetCardDetails($id) {
        $response = array('status' => false);

        $card = \app\models\RegistrationCards::findOne(['CardNumber' => $id]);

        if (!empty($card)) {
            $golfer = \app\models\Golfer::findOne(['golfer_id' => $card->UserID]);
            if (!empty($golfer)) {
                $golfer_name = $golfer->golfer_title . ' ' . $golfer->golfer_firstname . ' ' . $golfer->golfer_lastname;
                $golfclub_name = \app\models\GolfClub::getGolfClubName($golfer->golfer_firstClubID);
                $response = array('status' => true, 'name' => $golfer_name, 'club' => $golfclub_name);
            }
        }

        echo json_encode($response);
        exit();
    }

    public function actionGetCardReaders($id) {
        $card_readers = \app\models\CardReaders::find()->where(['GolfCourse' => $id])->orderBy('ReaderName')->all();

        $response = array('status' => false);
        if (!empty($card_readers)) {
            $card_readers_list = \yii\helpers\ArrayHelper::map($card_readers, 'ID', 'ReaderName');
            $response = array('status' => true, 'list' => $card_readers_list);
        }

        echo json_encode($response);
        exit();
    }

}
