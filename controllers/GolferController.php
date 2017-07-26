<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use app\models\User;
use app\models\Golfer;
use app\models\GolfClub;
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
     * Lists all Golfer models.
     * @return mixed
     */
    public function actionIndex() {
        $model = new Golfer();

        if (Yii::$app->user->identity->user_roleID == 3) {
            $user_id = Yii::$app->user->identity->user_id;
            $club = GolfClub::findOne(['golfclub_userID' => $user_id]);
            if (!empty($club)) {
                $model = Golfer::find()->where(['=', 'golfer_firstClubID', $club->golfclub_id])->all();
            } else {
                $model = Golfer::find()->where(['=', 'golfer_firstClubID', 0])->all();
            }
        } else {
            $model = Golfer::find()->all();
        }

        return $this->render('index', ['data' => $model]);
    }

    /**
     * Displays a single Golfer model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        if (Yii::$app->user->identity->user_roleID == 2) {
            $user_id = Yii::$app->user->identity->user_id;
            $golfer = \app\models\Golfer::findOne(['golfer_userID' => $user_id]);
            if ($golfer->golfer_id == $id) {
                $model = $this->findModel($id);
            } else {
                return $this->redirect(['site/no-access']);
            }
        } else if (Yii::$app->user->identity->user_roleID == 3) {
//            $user_id = Yii::$app->user->identity->user_id;
//            $club = GolfClub::findOne(['golfclub_userID' => $user_id]);
//            if (!empty($club)) {
//                $model = Golfer::find()->where(['=', 'golfer_firstClubID', $club->golfclub_id])->andWhere(['golfer_id' => $id])->one();
//            } else {
//                return $this->redirect(['site/no-access']);
//            }
            $model = $this->findModel($id);
        } else {
            $model = $this->findModel($id);
        }

        return $this->render('view', ['model' => $model]);
    }

    /**
     * Creates a new Golfer model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Golfer();
        $model->setScenario('create');

        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }

        if ($model->load(Yii::$app->request->post())) {

//            print_r($_POST);
//            print_r($model->attributes);
//            die;

            if (empty($_POST['Golfer']['golfer_isMemberOfAnotherClub'])) {
                $model->golfer_isMemberOfAnotherClub = 1;
                $model->golfer_otherClubID = 0;
            }

            if ($model->validate()) {

                //print_r($_POST);
                $model->golfer_dateOfBirth = date('Y-m-d', strtotime($model->golfer_dateOfBirth));
                //print_r($model->attributes);
                //die;

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

                        $card = \app\models\RegistrationCards::findOne(['ID' => $_POST['Golfer']['golfer_card_number']]);
                        $card->UserID = $model->golfer_id;
                        $card->RegisteredDate = date('Y-m-d');
                        if ($card->save(false)) {

                            Yii::$app
                                    ->mailer
                                    ->compose(['html' => 'welcomeGolferEmail-html', 'text' => 'welcomeGolferEmail-text'], ['user' => $user, 'golfer' => $model])
                                    ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name])
                                    ->setTo($user->user_email)
                                    ->setSubject('Account Verification Link for ' . Yii::$app->name)
                                    ->send();

                            \Yii::$app->session->setFlash('type', 'success');
                            \Yii::$app->session->setFlash('title', 'Golfer');
                            \Yii::$app->session->setFlash('message', 'Golfer added successfully.');
                        } else {
//                            echo 'Card Issue';
//                            print_r($card->getErrors());
//                            die;
                        }

                        return $this->redirect(['index']);
                    } else {
//                        echo 'Golfer Issue';
//                        print_r($model->getErrors());
//                        die;
                    }
                } else {
//                    echo 'User Issue';
//                    print_r($model->getErrors());
//                    die;
                }
            } else {
//                echo 'Validation Issue';
//                print_r($model->getErrors());
//                die;
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
        $model->setScenario('update');

        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }

        if ($model->load(Yii::$app->request->post())) {

            //print_r($model->oldAttributes);die;
            //$model->golfer_card_number = $model->oldAttributes->golfer_card_number;

            if ($model->validate()) {
                $model->golfer_dateOfBirth = date('Y-m-d', strtotime($model->golfer_dateOfBirth));

                $model->user->user_email = $model->user_email;
                $model->user->user_username = $model->user_username;
                if (!empty($model->user_password)) {
                    $model->user->setPassword($model->user_password);
                    $model->user->generateAuthKey();
                }

                if ($model->save() && $model->user->save()) {

                    $emptyCard = \app\models\RegistrationCards::findOne(['UserID' => $model->golfer_id]);
                    if (!empty($emptyCard)) {
                        if ($emptyCard->ID != $_POST['Golfer']['golfer_card_number']) {
                            $emptyCard->UserID = 0;
                            $emptyCard->RegisteredDate = '';
                            $emptyCard->save(FALSE);
                        }
                    }

                    $card = \app\models\RegistrationCards::findOne(['ID' => $model->golfer_card_number]);
                    $card->UserID = $model->golfer_id;
                    $card->RegisteredDate = date('Y-m-d');

                    if ($card->save(false)) {
                        \Yii::$app->session->setFlash('type', 'success');
                        \Yii::$app->session->setFlash('title', 'Golfer');
                        \Yii::$app->session->setFlash('message', 'Golfer updated successfully.');
                    } else {
                        \Yii::$app->session->setFlash('type', 'danger');
                        \Yii::$app->session->setFlash('title', 'Golfer');
                        \Yii::$app->session->setFlash('message', 'Golfer Card Number update failed.');
                    }

                    if (\Yii::$app->user->identity->user_roleID == 2) {
                        return $this->redirect(['view', 'id' => $model->golfer_id]);
                    } else {
                        return $this->redirect(['index']);
                    }
                } else {
                    \Yii::$app->session->setFlash('type', 'danger');
                    \Yii::$app->session->setFlash('title', 'Golfer');
                    \Yii::$app->session->setFlash('message', 'Golfer update failed.');
                }
            } else {
                print_r($model->getErrors());
                die;
            }
        }

        return $this->renderAjax('_form', ['model' => $model]);
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

    public function actionGetCards($id) {
        $cards = \app\models\RegistrationCards::find()->where(['UserID' => 0, 'ClubID' => $id])->orderby('CardNumber')->all();

        $cardsList = [];
        if (!empty($cards)) {
            $cardsList = \yii\helpers\ArrayHelper::map($cards, 'ID', 'CardNumber');
        }

        $response = array('cards' => $cardsList);
        echo json_encode($response);
        exit();
    }

    public function actionChangePassword($id) {
        $model = $this->findModel($id);
        $model->setScenario('changepassword');

        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }

        if ($model->load(Yii::$app->request->post())) {

            $model->user->setPassword($model->confirm_new_password);
            //$model->user->generateAuthKey();
//            print_r($_POST);
//            print_r($model->attributes);
//            print_r($model->user);
//            die;

            if ($model->user->save()) {
                \Yii::$app->session->setFlash('type', 'success');
                \Yii::$app->session->setFlash('title', 'Golfer');
                \Yii::$app->session->setFlash('message', 'Password Changed Sucessfully.');
            } else {
                \Yii::$app->session->setFlash('type', 'danger');
                \Yii::$app->session->setFlash('title', 'Golfer');
                \Yii::$app->session->setFlash('message', 'Password Changed Failed.');
            }

            return $this->redirect(['view', 'id' => $id]);
        } else {
            return $this->renderAjax('_change_password', ['model' => $model]);
        }
    }

    public function actionGolferNotes($id) {
        $model = $this->findModel($id);

        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }

        if ($model->load(Yii::$app->request->post())) {
            $model->user_username = 'abc';
            $model->user_email = 'abc@abc.com';
            $model->acceptTermsCondition = 1;
            //$model->user->generateAuthKey();
//            print_r($_POST);
//            print_r($model->attributes);
//            print_r($model->user);
//            die;

            if ($model->save()) {
                \Yii::$app->session->setFlash('type', 'success');
                \Yii::$app->session->setFlash('title', 'Golfer');
                \Yii::$app->session->setFlash('message', 'Golfer Notes Updated.');
            } else {
                \Yii::$app->session->setFlash('type', 'danger');
                \Yii::$app->session->setFlash('title', 'Golfer');
                \Yii::$app->session->setFlash('message', 'Golfer Notes Update Failed.');
            }

            return $this->redirect(['view', 'id' => $id]);
        } else {
            return $this->renderAjax('_golfer_notes', ['model' => $model]);
        }
    }

}
