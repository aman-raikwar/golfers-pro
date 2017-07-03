<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RegistrationCards */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="registration-cards-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'CardNumber')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'UserID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'RegisteredDate')->textInput() ?>

    <?= $form->field($model, 'ClubID')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
