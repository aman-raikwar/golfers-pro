<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Golfer */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin(['enableClientValidation' => true, 'enableAjaxValidation' => true, 'options' => ['enctype' => 'multipart/form-data', 'id' => 'request-cards-form']]); ?>

<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h4 class="modal-title" id="myModalLabel">Request More Golfer Cards</h4>    
</div>

<div class="modal-body">

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                Let us know how many Golfer Cards you need and we will send out a fresh batch to you. It typically takes 5 days for us to deliver your Cards from the day of request.
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="control-label" for="number_of_cards">Number of Cards:</label>
                <input type="text" id="number_of_cards" class="form-control" name="number_of_cards" maxlength="5">
                <div class="help-block"></div>
            </div>
        </div>
    </div>    
</div>

<div class="modal-footer">
    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
    <?= Html::submitButton('Request Cards', ['class' => 'btn btn-danger waves-effect waves-light', 'id' => 'btnSave']); ?>
</div>

<?php $form = ActiveForm::end(); ?>

<?php
$script = <<< JS
    $('#btnSave').on('click', function() {
        if($('#number_of_cards').val() =='') {
            $('.help-block').html('Please enter Number of Cards that you required!');
            $('#number_of_cards').parents('.form-group').addClass('required').addClass('has-error');
            return false;
        } else {
            $('.help-block').html('');
            $('#number_of_cards').parents('.form-group').removeClass('required').removeClass('has-error');
        }
     });
JS;
$this->registerJs($script);
?>