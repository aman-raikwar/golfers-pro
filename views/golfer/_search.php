<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\GolferSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="golfer-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'golfer_id') ?>

    <?= $form->field($model, 'golfer_title') ?>

    <?= $form->field($model, 'golfer_firstname') ?>

    <?= $form->field($model, 'golfer_lastname') ?>

    <?= $form->field($model, 'golfer_gender') ?>

    <?php // echo $form->field($model, 'golfer_dateOfBirth') ?>

    <?php // echo $form->field($model, 'golfer_address1') ?>

    <?php // echo $form->field($model, 'golfer_address2') ?>

    <?php // echo $form->field($model, 'golfer_phone') ?>

    <?php // echo $form->field($model, 'golfer_town') ?>

    <?php // echo $form->field($model, 'golfer_firstClubID') ?>

    <?php // echo $form->field($model, 'golfer_isMemberOfAnotherClub') ?>

    <?php // echo $form->field($model, 'golfer_otherClubID') ?>

    <?php // echo $form->field($model, 'golfer_country') ?>

    <?php // echo $form->field($model, 'golfer_county') ?>

    <?php // echo $form->field($model, 'golfer_countyCardId') ?>

    <?php // echo $form->field($model, 'golfer_countyCardNumber') ?>

    <?php // echo $form->field($model, 'golfer_postCode') ?>

    <?php // echo $form->field($model, 'golfer_notes') ?>

    <?php // echo $form->field($model, 'golfer_lifetimeID') ?>

    <?php // echo $form->field($model, 'golfer_optIn') ?>

    <?php // echo $form->field($model, 'golfer_opgRegType') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
