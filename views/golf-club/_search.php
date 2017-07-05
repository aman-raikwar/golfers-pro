<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\GolfClubSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="golf-club-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'golfclub_id') ?>

    <?= $form->field($model, 'golfclub_name') ?>

    <?= $form->field($model, 'golfclub_facebookUrl') ?>

    <?= $form->field($model, 'golfclub_twitterUrl') ?>

    <?= $form->field($model, 'golfclub_phone') ?>

    <?php // echo $form->field($model, 'golfclub_address1') ?>

    <?php // echo $form->field($model, 'golfclub_address2') ?>

    <?php // echo $form->field($model, 'golfclub_town') ?>

    <?php // echo $form->field($model, 'golfclub_countryID') ?>

    <?php // echo $form->field($model, 'golfclub_countyID') ?>

    <?php // echo $form->field($model, 'golfclub_postCode') ?>

    <?php // echo $form->field($model, 'golfclub_addressNotes') ?>

    <?php // echo $form->field($model, 'golfclub_description') ?>

    <?php // echo $form->field($model, 'golfclub_websiteUrl') ?>

    <?php // echo $form->field($model, 'golfclub_holes') ?>

    <?php // echo $form->field($model, 'golfclub_yardage') ?>

    <?php // echo $form->field($model, 'golfclub_par') ?>

    <?php // echo $form->field($model, 'golfclub_gpgUrl') ?>

    <?php // echo $form->field($model, 'golfclub_logo') ?>

    <?php // echo $form->field($model, 'golfclub_greenFeeFrom') ?>

    <?php // echo $form->field($model, 'golfclub_greenFeeTo') ?>

    <?php // echo $form->field($model, 'golfclub_facilities') ?>

    <?php // echo $form->field($model, 'golfclub_userID') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
