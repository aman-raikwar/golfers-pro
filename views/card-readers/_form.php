<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CardReaders */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="card-readers-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ReaderName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'GolfCourse')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
