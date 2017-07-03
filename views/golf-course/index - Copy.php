<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\GolfCourseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Golf Courses';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="golf-course-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Golf Course', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID',
            'Name',
            'LoginID',
            'Password',
            'IsAdmin',
            // 'Activationkey',
            // 'Email:email',
            // 'ClubFacebook',
            // 'ClubTwitter',
            // 'ContactNumber',
            // 'Address1',
            // 'Address2',
            // 'Town',
            // 'County',
            // 'Country',
            // 'PostCode',
            // 'AddressNote',
            // 'ClubDescription',
            // 'ClubUrl:url',
            // 'ClubHoles',
            // 'ClubYardage',
            // 'ClubPar',
            // 'GpgUrl:url',
            // 'ClubLogo',
            // 'MainImage',
            // 'GreenFeeFrom',
            // 'GreenFeeTo',
            // 'hasDrivingRange',
            // 'hasPracticeGround',
            // 'hasPracticeNet',
            // 'hasPuttingGreen',
            // 'hasSwingStudio',
            // 'hasBuggyHire',
            // 'hasTrolleyHire',
            // 'allowsSociety',
            // 'hasVenueHire',
            // 'hasShowers',
            // 'hasSnooker',
            // 'hasGym',
            // 'hasSwimming',
            // 'hasAccommodation',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
