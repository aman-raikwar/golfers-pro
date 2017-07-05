<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<?php $form = ActiveForm::begin(['enableClientValidation' => true, 'enableAjaxValidation' => true, 'options' => ['enctype' => 'multipart/form-data', 'id' => 'role-form']]); ?>

<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h4 class="modal-title" id="myModalLabel"><?php echo ($model->isNewRecord) ? 'Add a Role' : 'Edit Role'; ?></h4>    
</div>

<div class="modal-body">
    <div class="row">
        <div class="col-sm-12">
            <?= $form->field($model, 'role_name')->textInput(['maxlength' => true]) ?>    
        </div>
    </div>

    <?php if (!$model->isNewRecord) { ?>
        <div class="row">
            <div class="col-sm-12">
                <?= $form->field($model, 'status')->dropDownList(['1' => 'Active', '0' => 'In-active'], ['prompt' => 'Select Status']) ?>                    
            </div>
        </div>
    <?php } ?>    
</div>

<div class="modal-footer">
    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
    <?= Html::submitButton('Save Changes', ['class' => 'btn btn-danger waves-effect waves-light', 'id' => 'btnSave']); ?>
</div>

<?php ActiveForm::end(); ?>