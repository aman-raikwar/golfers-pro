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

            $s_number = '8';
            $card1 = substr($firstcard_number, 0, 3);
            $card2 = substr($lastcard_number, 0, 3);
            $len = strlen($firstcard_number);
            $len2 = strlen($lastcard_number);
            $card_len1 = strlen($card1);
            $card_len2 = strlen($card2);

            $flag = 0;
            if ($len == 11 && $card_len1 == 3 && $card1 == $card2 && $len == $len2) {
                $card1 = substr($firstcard_number, 0, 3);
                $min = filter_var($firstcard_number, FILTER_SANITIZE_NUMBER_INT);
                //$min = filter_var($firstcard_number, FILTER_SANITIZE_NUMBER_INT);
                $max = filter_var($lastcard_number, FILTER_SANITIZE_NUMBER_INT);
                for ($x = $min; $x <= $max; $x++) {
                    $x = str_pad($x, 8, '0', STR_PAD_LEFT);
                    $card = $card1 . $x;
                    ///echo "<br>";
                    ///insert card functionality
                    $oldModel = RegistrationCards::findOne(['CardNumber' => $card]);
                    if (empty($oldModel)) {
                        $model->ID = NULL;
                        $model->CardNumber = $card;
                        $model->ClubID = $model->ClubID;
                        $model->UserID = 0;
                        $model->RegisteredDate = date('Y-m-d');
                        $model->isNewRecord = TRUE;
                        $model->save();
                        $flag = 1;
                    }
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

    public function actionRequestCards() {
        if (Yii::$app->request->post()) {
            $request = Yii::$app->request->post();
            $number_of_cards = $request['number_of_cards'];

            $user = Yii::$app->user->identity;

            $mail = Yii::$app
                    ->mailer
                    ->compose(['html' => 'requestMoreGolferCards-html', 'text' => 'requestMoreGolferCards-text'], ['user' => $user, 'number_of_cards' => $number_of_cards])
                    ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name . ' robot'])
                    ->setTo($user->user_email)
                    ->setSubject('Request More Golfer Cards for ' . Yii::$app->name)
                    ->send();

            if ($mail) {
                \Yii::$app->session->setFlash('type', 'success');
                \Yii::$app->session->setFlash('title', 'Request More Golfer Cards');
                \Yii::$app->session->setFlash('message', 'Request successfully sent.');
            } else {
                \Yii::$app->session->setFlash('type', 'danger');
                \Yii::$app->session->setFlash('title', 'Request More Golfer Cards');
                \Yii::$app->session->setFlash('message', 'Request failed to send.');
            }
            return $this->redirect(['index']);
        }
        return $this->renderAjax('_request_form');
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
