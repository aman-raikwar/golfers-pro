<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RegistrationCardsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Registration Cards';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="registration-cards-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Registration Cards', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID',
            'CardNumber',
            'UserID',
            'RegisteredDate',
            'ClubID',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
