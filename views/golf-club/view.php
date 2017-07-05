<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\GolfClub */

$this->title = $model->golfclub_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Golf Clubs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="golf-club-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->golfclub_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->golfclub_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'golfclub_id',
            'golfclub_name',
            'golfclub_facebookUrl:url',
            'golfclub_twitterUrl:url',
            'golfclub_phone',
            'golfclub_address1',
            'golfclub_address2',
            'golfclub_town',
            'golfclub_countryID',
            'golfclub_countyID',
            'golfclub_postCode',
            'golfclub_addressNotes',
            'golfclub_description',
            'golfclub_websiteUrl:url',
            'golfclub_holes',
            'golfclub_yardage',
            'golfclub_par',
            'golfclub_gpgUrl:url',
            'golfclub_logo',
            'golfclub_greenFeeFrom',
            'golfclub_greenFeeTo',
            'golfclub_facilities',
            'golfclub_userID',
        ],
    ]) ?>

</div>
