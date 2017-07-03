<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\GolfCourseSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="golf-course-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID') ?>

    <?= $form->field($model, 'Name') ?>

    <?= $form->field($model, 'LoginID') ?>

    <?= $form->field($model, 'Password') ?>

    <?= $form->field($model, 'IsAdmin') ?>

    <?php // echo $form->field($model, 'Activationkey') ?>

    <?php // echo $form->field($model, 'Email') ?>

    <?php // echo $form->field($model, 'ClubFacebook') ?>

    <?php // echo $form->field($model, 'ClubTwitter') ?>

    <?php // echo $form->field($model, 'ContactNumber') ?>

    <?php // echo $form->field($model, 'Address1') ?>

    <?php // echo $form->field($model, 'Address2') ?>

    <?php // echo $form->field($model, 'Town') ?>

    <?php // echo $form->field($model, 'County') ?>

    <?php // echo $form->field($model, 'Country') ?>

    <?php // echo $form->field($model, 'PostCode') ?>

    <?php // echo $form->field($model, 'AddressNote') ?>

    <?php // echo $form->field($model, 'ClubDescription') ?>

    <?php // echo $form->field($model, 'ClubUrl') ?>

    <?php // echo $form->field($model, 'ClubHoles') ?>

    <?php // echo $form->field($model, 'ClubYardage') ?>

    <?php // echo $form->field($model, 'ClubPar') ?>

    <?php // echo $form->field($model, 'GpgUrl') ?>

    <?php // echo $form->field($model, 'ClubLogo') ?>

    <?php // echo $form->field($model, 'MainImage') ?>

    <?php // echo $form->field($model, 'GreenFeeFrom') ?>

    <?php // echo $form->field($model, 'GreenFeeTo') ?>

    <?php // echo $form->field($model, 'hasDrivingRange') ?>

    <?php // echo $form->field($model, 'hasPracticeGround') ?>

    <?php // echo $form->field($model, 'hasPracticeNet') ?>

    <?php // echo $form->field($model, 'hasPuttingGreen') ?>

    <?php // echo $form->field($model, 'hasSwingStudio') ?>

    <?php // echo $form->field($model, 'hasBuggyHire') ?>

    <?php // echo $form->field($model, 'hasTrolleyHire') ?>

    <?php // echo $form->field($model, 'allowsSociety') ?>

    <?php // echo $form->field($model, 'hasVenueHire') ?>

    <?php // echo $form->field($model, 'hasShowers') ?>

    <?php // echo $form->field($model, 'hasSnooker') ?>

    <?php // echo $form->field($model, 'hasGym') ?>

    <?php // echo $form->field($model, 'hasSwimming') ?>

    <?php // echo $form->field($model, 'hasAccommodation') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
