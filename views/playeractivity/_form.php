<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Playeractivity */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="playeractivity-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ReaderID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CardID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Date')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
