<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PlayerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Players';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="player-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Player', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID',
            'FirstClubID',
            'FirstName',
            'LastName',
            'DateOfBirth',
            // 'Email:email',
            // 'Address',
            // 'RegisterationKey',
            // 'Password',
            // 'isRegistered',
            // 'PhoneNo',
            // 'Title',
            // 'IsMemberOfAnotherClub',
            // 'OtherClubName',
            // 'Gender',
            // 'Address2',
            // 'Town',
            // 'County',
            // 'Country',
            // 'CountyCardId',
            // 'CountyCardNumber',
            // 'PostCode',
            // 'Notes',
            // 'player_lifetime_id',
            // 'optIn',
            // 'activation_key',
            // 'on_date',
            // 'OpgRegType',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
