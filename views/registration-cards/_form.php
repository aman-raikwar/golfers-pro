<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\GolfClub;
use app\models\CardMembershipCategory;
use app\models\Country;
use app\models\County;
use app\components\Utility;

/* @var $this yii\web\View */
/* @var $model app\models\Golfer */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin(['enableClientValidation' => true, 'enableAjaxValidation' => true, 'options' => ['enctype' => 'multipart/form-data', 'id' => 'registration-cards-form']]); ?>

<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h4 class="modal-title" id="myModalLabel"><?php echo ($model->isNewRecord) ? 'Add Cards' : 'Edit Cards'; ?></h4>    
</div>

<div class="modal-body">

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                To add a new batch of Golfer Cards, please enter the first (top range) card number and the last (bottom range) card number. And click Add, this will insert all the cards sequentially in the system.
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <?php
            $clubs = GolfClub::find()->orderBy('golfclub_name')->all();
            $clubsList = ArrayHelper::map($clubs, 'golfclub_id', 'golfclub_name');
            ?>
            <?= $form->field($model, 'ClubID')->dropDownList($clubsList, ['prompt' => 'Select Golf Club', 'class' => 'form-control select2']) ?>
        </div>
    </div>    

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'firstcard_number')->textInput(['maxlength' => true, 'autocomplete' => 'off']) ?>
        </div>                                    
        <div class="col-md-6">
            <?= $form->field($model, 'lastcard_number')->textInput(['maxlength' => true, 'autocomplete' => 'off']) ?>
        </div>
    </div>    
</div>

<div class="modal-footer">
    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
    <?= Html::submitButton('Add Cards', ['class' => 'btn btn-danger waves-effect waves-light', 'id' => 'btnSave']); ?>
</div>

<?php $form = ActiveForm::end(); ?>

<?php $this->registerJsFile(Yii::$app->request->baseUrl . '/js/registration-cards-script.js', ['depends' => [\yii\web\JqueryAsset::className()]]); ?>