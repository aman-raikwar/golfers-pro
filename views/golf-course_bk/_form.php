<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\GolfCourse */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="golf-course-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'LoginID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Password')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'IsAdmin')->textInput() ?>

    <?= $form->field($model, 'Activationkey')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ClubFacebook')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ClubTwitter')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ContactNumber')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Address1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Address2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Town')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'County')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Country')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PostCode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'AddressNote')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ClubDescription')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ClubUrl')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ClubHoles')->textInput() ?>

    <?= $form->field($model, 'ClubYardage')->textInput() ?>

    <?= $form->field($model, 'ClubPar')->textInput() ?>

    <?= $form->field($model, 'GpgUrl')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ClubLogo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'MainImage')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'GreenFeeFrom')->textInput() ?>

    <?= $form->field($model, 'GreenFeeTo')->textInput() ?>

    <?= $form->field($model, 'hasDrivingRange')->textInput() ?>

    <?= $form->field($model, 'hasPracticeGround')->textInput() ?>

    <?= $form->field($model, 'hasPracticeNet')->textInput() ?>

    <?= $form->field($model, 'hasPuttingGreen')->textInput() ?>

    <?= $form->field($model, 'hasSwingStudio')->textInput() ?>

    <?= $form->field($model, 'hasBuggyHire')->textInput() ?>

    <?= $form->field($model, 'hasTrolleyHire')->textInput() ?>

    <?= $form->field($model, 'allowsSociety')->textInput() ?>

    <?= $form->field($model, 'hasVenueHire')->textInput() ?>

    <?= $form->field($model, 'hasShowers')->textInput() ?>

    <?= $form->field($model, 'hasSnooker')->textInput() ?>

    <?= $form->field($model, 'hasGym')->textInput() ?>

    <?= $form->field($model, 'hasSwimming')->textInput() ?>

    <?= $form->field($model, 'hasAccommodation')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
