<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Golfer */

$this->title = $model->golfer_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Golfers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="golfer-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->golfer_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->golfer_id], [
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
            'golfer_id',
            'golfer_title',
            'golfer_firstname',
            'golfer_lastname',
            'golfer_gender',
            'golfer_dateOfBirth',
            'golfer_address1',
            'golfer_address2',
            'golfer_phone',
            'golfer_town',
            'golfer_firstClubID',
            'golfer_isMemberOfAnotherClub',
            'golfer_otherClubID',
            'golfer_country',
            'golfer_county',
            'golfer_countyCardId',
            'golfer_countyCardNumber',
            'golfer_postCode',
            'golfer_notes',
            'golfer_lifetimeID',
            'golfer_optIn',
            'golfer_opgRegType',
        ],
    ]) ?>

</div>
