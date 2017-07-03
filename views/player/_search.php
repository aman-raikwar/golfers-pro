<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PlayerSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="player-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID') ?>

    <?= $form->field($model, 'FirstClubID') ?>

    <?= $form->field($model, 'FirstName') ?>

    <?= $form->field($model, 'LastName') ?>

    <?= $form->field($model, 'DateOfBirth') ?>

    <?php // echo $form->field($model, 'Email') ?>

    <?php // echo $form->field($model, 'Address') ?>

    <?php // echo $form->field($model, 'RegisterationKey') ?>

    <?php // echo $form->field($model, 'Password') ?>

    <?php // echo $form->field($model, 'isRegistered') ?>

    <?php // echo $form->field($model, 'PhoneNo') ?>

    <?php // echo $form->field($model, 'Title') ?>

    <?php // echo $form->field($model, 'IsMemberOfAnotherClub') ?>

    <?php // echo $form->field($model, 'OtherClubName') ?>

    <?php // echo $form->field($model, 'Gender') ?>

    <?php // echo $form->field($model, 'Address2') ?>

    <?php // echo $form->field($model, 'Town') ?>

    <?php // echo $form->field($model, 'County') ?>

    <?php // echo $form->field($model, 'Country') ?>

    <?php // echo $form->field($model, 'CountyCardId') ?>

    <?php // echo $form->field($model, 'CountyCardNumber') ?>

    <?php // echo $form->field($model, 'PostCode') ?>

    <?php // echo $form->field($model, 'Notes') ?>

    <?php // echo $form->field($model, 'player_lifetime_id') ?>

    <?php // echo $form->field($model, 'optIn') ?>

    <?php // echo $form->field($model, 'activation_key') ?>

    <?php // echo $form->field($model, 'on_date') ?>

    <?php // echo $form->field($model, 'OpgRegType') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
