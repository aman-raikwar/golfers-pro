<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\GolfCourse */

$this->title = $model->Name;
$this->params['breadcrumbs'][] = ['label' => 'Golf Courses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="golf-course-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->ID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ID',
            'Name',
            'LoginID',
            'Password',
            'IsAdmin',
            'Activationkey',
            'Email:email',
            'ClubFacebook',
            'ClubTwitter',
            'ContactNumber',
            'Address1',
            'Address2',
            'Town',
            'County',
            'Country',
            'PostCode',
            'AddressNote',
            'ClubDescription',
            'ClubUrl:url',
            'ClubHoles',
            'ClubYardage',
            'ClubPar',
            'GpgUrl:url',
            'ClubLogo',
            'MainImage',
            'GreenFeeFrom',
            'GreenFeeTo',
            'hasDrivingRange',
            'hasPracticeGround',
            'hasPracticeNet',
            'hasPuttingGreen',
            'hasSwingStudio',
            'hasBuggyHire',
            'hasTrolleyHire',
            'allowsSociety',
            'hasVenueHire',
            'hasShowers',
            'hasSnooker',
            'hasGym',
            'hasSwimming',
            'hasAccommodation',
        ],
    ]) ?>

</div>
