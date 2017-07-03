<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Player */

$this->title = $model->Title;
$this->params['breadcrumbs'][] = ['label' => 'Players', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="player-view">

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
            'FirstClubID',
            'FirstName',
            'LastName',
            'DateOfBirth',
            'Email:email',
            'Address',
            'RegisterationKey',
            'Password',
            'isRegistered',
            'PhoneNo',
            'Title',
            'IsMemberOfAnotherClub',
            'OtherClubName',
            'Gender',
            'Address2',
            'Town',
            'County',
            'Country',
            'CountyCardId',
            'CountyCardNumber',
            'PostCode',
            'Notes',
            'player_lifetime_id',
            'optIn',
            'activation_key',
            'on_date',
            'OpgRegType',
        ],
    ]) ?>

</div>
