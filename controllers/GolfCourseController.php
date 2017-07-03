<?php

namespace app\controllers;

use Yii;
use app\models\GolfCourse;
use app\models\GolfCourseSearch;
use app\models\County;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\web\UploadedFile;

/**
 * GolfCourseController implements the CRUD actions for GolfCourse model.
 */
class GolfCourseController extends Controller {

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
     * Lists all GolfCourse models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new GolfCourse();
        // //$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $data = $searchModel->getAll();
        // //print_r($data);die;
        return $this->render('index', [
                    'data' => $data,
                    'model' => $searchModel,
        ]);
        // $searchModel = new GolfCourseSearch();
        // $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        // return $this->render('index', [
        //     'searchModel' => $searchModel,
        //     'dataProvider' => $dataProvider,
        //     'data' => $data,
        // ]);
    }

    /**
     * Displays a single GolfCourse model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new GolfCourse model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new GolfCourse();

        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }

        if ($model->load(Yii::$app->request->post())) {

            $clubLogo = UploadedFile::getInstance($model, 'ClubLogo');
            if (!empty($clubLogo)) {
                $ClubLogoFileName = date('YmdHis') . '_' . $clubLogo->baseName . '.' . $clubLogo->extension;
                $ClubLogoFilePath = 'uploads/' . $ClubLogoFileName;
                $clubLogo->saveAs($ClubLogoFilePath);
                $model->ClubLogo = $ClubLogoFileName;
            }

            if (!empty($_POST['GolfCourse']['ClubFacilities'])) {
                $model->ClubFacilities = implode(',', $_POST['GolfCourse']['ClubFacilities']);
            }           

            if ($model->save()) {
                return $this->redirect(['index']);
            } else {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ActiveForm::validate($model);
            }
        } else {
            return $this->renderAjax('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing GolfCourse model.
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

            $clubLogo = UploadedFile::getInstance($model, 'ClubLogo');
            if (!empty($clubLogo)) {
                $ClubLogoFileName = date('YmdHis') . '_' . $clubLogo->baseName . '.' . $clubLogo->extension;
                $ClubLogoFilePath = 'uploads/' . $ClubLogoFileName;
                $clubLogo->saveAs($ClubLogoFilePath);
                $model->ClubLogo = $ClubLogoFileName;
            }

            if (!empty($_POST['GolfCourse']['ClubFacilities'])) {
                $model->ClubFacilities = implode(',', $_POST['GolfCourse']['ClubFacilities']);
            }

            if ($model->save()) {
                return $this->redirect(['index']);
            } else {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ActiveForm::validate($model);
            }
        } else {
            return $this->renderAjax('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing GolfCourse model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the GolfCourse model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return GolfCourse the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = GolfCourse::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionCountyList($id) {
        $counties = County::find()->where('country_id = :country_id', [':country_id' => $id])->all();
        $response = array('status' => false);
        if (!empty($counties)) {
            $countyList = ArrayHelper::map($counties, 'id', 'name');
            $response = array('status' => true, 'counties' => $countyList);
        }

        echo json_encode($response);
        exit();
    }

}
