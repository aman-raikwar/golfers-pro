<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\GolfClub;
use app\models\CardReaders;
use app\models\RegistrationCards;
?>

<?php $form = ActiveForm::begin(['enableClientValidation' => true, 'enableAjaxValidation' => true, 'options' => ['enctype' => 'multipart/form-data', 'id' => 'golfer-activity-form']]); ?>

<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h4 class="modal-title" id="myModalLabel"><?php echo ($model->isNewRecord) ? 'Add Activity' : 'Edit Activity'; ?></h4>    
</div>

<div class="modal-body">

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <?php
                $cards = array();
                $user_id = Yii::$app->user->identity->user_id;

                if (Yii::$app->user->identity->user_roleID == 3) {
                    $club = GolfClub::findOne(['golfclub_userID' => $user_id]);
                    if (!empty($club)) {
                        $cards = RegistrationCards::find()->where('UserID != :UserID', ['UserID' => 0])->andWhere(['ClubID' => $club->golfclub_id])->orderby('CardNumber')->all();
                    }
                } else {
                    $cards = RegistrationCards::find()->where('UserID != :UserID', ['UserID' => 0])->orderby('CardNumber')->all();
                }

                $cardsList = ArrayHelper::map($cards, 'CardNumber', 'CardNumber');
                echo $form->field($model, 'CardID')->dropDownList($cardsList, ['prompt' => 'Select Card Number', 'class' => 'form-control select2', 'data-url' => Url::to(['playeractivity/get-card-details'])]);
                ?>
            </div>
        </div>
    </div>

    <div class="row show-golfer-information" style="display: none;">
        <div class="col-md-12">
            <p><strong>Mr David Atkins</strong> from <strong>Cardiff Bay Golf Club</strong>.</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <?php
                $clubs = CardReaders::find()->select('GolfCourse')->distinct()->all();
                $clubsList = array();

                if (Yii::$app->user->identity->user_roleID == 3) {
                    $club = GolfClub::findOne(['golfclub_userID' => $user_id]);
                    if (!empty($club)) {
                        $model->club_id = $club->golfclub_id;
                    }
                }

                $disabled = 'false';
                if (!empty($clubs)) {
                    foreach ($clubs as $club) {
                        if (Yii::$app->user->identity->user_roleID == 3) {
                            if ($model->club_id == $club->GolfCourse) {
                                $clubsList[$club->GolfCourse] = GolfClub::getGolfClubName($club->GolfCourse);
                                $disabled = 'true';
                            }
                        } else {
                            $clubsList[$club->GolfCourse] = GolfClub::getGolfClubName($club->GolfCourse);
                        }
                    }
                }

                if (Yii::$app->user->identity->user_roleID == 1) {
                    $disabled = 'false';
                }

                echo $form->field($model, 'club_id')->dropDownList($clubsList, ['prompt' => 'Select Club', 'class' => 'form-control select2', 'data-url' => Url::to(['playeractivity/get-card-readers'])])->label('Check-in to Golf Club');
                ?>
            </div>
        </div>
    </div>

    <?php if (Yii::$app->user->identity->user_roleID == 3) { ?>
        <?php
        $readers = CardReaders::find()->where(['GolfCourse' => $model->club_id])->all();
        $readersList = ArrayHelper::map($readers, 'ID', 'ReaderName');
        $num = count($readersList);

        if ($num == 1) {
            foreach ($readersList as $k => $v) {
                $model->ReaderID = $k;
            }
            echo $form->field($model, 'ReaderID')->hiddenInput(['class' => 'form-control'])->label(false);
        } else {
            ?>
            <div class="row show-card-readers">
                <div class="col-md-12">
                    <?php echo $form->field($model, 'ReaderID')->dropDownList($readersList, ['prompt' => 'Select Card Reader', 'class' => 'form-control select2'])->label('Card Reader'); ?>
                </div>
            </div>
        <?php } ?>
    <?php } else { ?>
        <div class="row show-card-readers" style="display: none;">
            <div class="col-md-12">
                <?php echo $form->field($model, 'ReaderID')->dropDownList($cardsList, ['class' => 'form-control select2'])->label('Card Reader'); ?>
            </div>
        </div>
    <?php } ?>

    <div class="row">
        <div class="col-md-6">
            <?php
            if (!$model->isNewRecord) {
                $model->activity_date = date('d-m-Y', strtotime($model->Date));
            } else {
                $model->activity_date = date('d-m-Y');
            }
            ?>
            <?= $form->field($model, 'activity_date', ['template' => '<div>{label}<div class="input-group">{input} <span class="input-group-addon bg-custom b-0 show-datepicker"><i class="mdi mdi-calendar text-white"></i></span></div>{error}{hint}</div>'])->textInput(['placeholder' => 'DD-MM-YYYY', 'autocomplete' => 'off']); ?>
        </div>
        <div class="col-md-6">
            <?php
            if (!$model->isNewRecord) {
                $model->activity_time = date('H:i', strtotime($model->Date));
            }
            ?>
            <?= $form->field($model, 'activity_time', ['template' => '<div>{label}<div class="input-group">{input} <span class="input-group-addon bg-custom b-0 show-timepicker"><i class="mdi mdi-clock text-white"></i></span></div>{error}{hint}</div>'])->textInput(['placeholder' => 'HH:MM', 'autocomplete' => 'off']); ?>
        </div>
    </div>       
</div>

<div class="modal-footer">
    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
    <?= Html::submitButton($model->isNewRecord ? 'Add Activity' : 'Save Changes', ['class' => 'btn btn-danger waves-effect waves-light', 'id' => 'btnSave']); ?>
</div>

<?php $form = ActiveForm::end(); ?>

<?php $this->registerJsFile(Yii::$app->request->baseUrl . '/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js', ['depends' => [\yii\web\JqueryAsset::className()]]); ?>
<?php $this->registerJsFile(Yii::$app->request->baseUrl . '/plugins/timepicker/bootstrap-timepicker.js', ['depends' => [\yii\web\JqueryAsset::className()]]); ?>
<?php $this->registerJsFile(Yii::$app->request->baseUrl . '/js/golfer-activity-script.js', ['depends' => [\yii\web\JqueryAsset::className()]]); ?>