<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\GolfClub;
use app\models\CardReaders;
use app\models\RegistrationCards;
?>

<?php $form = ActiveForm::begin(['enableClientValidation' => true, 'enableAjaxValidation' => true, 'options' => ['enctype' => 'multipart/form-data', 'id' => 'card-readers-form']]); ?>

<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h4 class="modal-title" id="myModalLabel"><?php echo ($model->isNewRecord) ? 'Add Reader' : 'Edit Reader'; ?></h4>    
</div>

<div class="modal-body">
    <p>Enter the reader unique reference number and then select a club from the drop-down.</p>

    <div class="row">        
        <div class="col-md-12">            
            <?= $form->field($model, 'ReaderName')->textInput(['placeholder' => '', 'autocomplete' => 'off'])->label('Reader Reference Number:'); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <?php
                $disabled = false;
                if (!$model->isNewRecord) {
                    $disabled = true;
                }
                $clubs = GolfClub::find()->orderBy('golfclub_name')->all();
                $clubsList = ArrayHelper::map($clubs, 'golfclub_id', 'golfclub_name');
                echo $form->field($model, 'GolfCourse')->dropDownList($clubsList, ['prompt' => 'Select Golf Club', 'class' => 'form-control select2', 'disabled' => $disabled])->label('Select Golf Club:');
                ?>
            </div>
        </div>
    </div>                
</div>

<div class="modal-footer">
    <?php if ($model->isNewRecord) { ?>
        <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
        <?= Html::submitButton('Add', ['class' => 'btn btn-danger waves-effect waves-light', 'id' => 'btnSave']); ?>
    <?php } else { ?>
        <?= Html::a('Delete', ['card-readers/delete', 'id' => $model->ID], ['class' => 'btn btn-secondary waves-effect text-danger', 'data' => ['method' => 'post']]) ?>
        <?= Html::submitButton('Update', ['class' => 'btn btn-danger waves-effect waves-light', 'id' => 'btnSave']); ?>
    <?php } ?>
</div>

<?php $form = ActiveForm::end(); ?>

<?php $this->registerJsFile(Yii::$app->request->baseUrl . '/js/card-readers-script.js', ['depends' => [\yii\web\JqueryAsset::className()]]); ?>