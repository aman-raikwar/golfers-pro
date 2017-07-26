<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Country;
use app\models\County;
?>

<?php $form = ActiveForm::begin(['enableClientValidation' => true, 'enableAjaxValidation' => true, 'options' => ['enctype' => 'multipart/form-data', 'id' => 'golf-club-change-password-form']]); ?>

<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h4 class="modal-title" id="myModalLabel">Edit Golfer Notes</h4>    
</div>

<div class="modal-body">
    <div class="row">
        <div class="col-md-12">
            <?= $form->field($model, 'golfer_notes')->textarea(['class' => "form-control", "id" => "golfer_notes", 'placeholder' => 'Notes can be written and added to within this box here.']) ?>
        </div>
    </div>
</div>

<div class="modal-footer">
    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
    <?= Html::submitButton('Update Notes', ['class' => 'btn btn-danger waves-effect', 'id' => 'btnSave']); ?>
</div>

<?php ActiveForm::end(); ?>