<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PlayeractivitySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Playeractivities';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="playeractivity-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Playeractivity', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID',
            'ReaderID',
            'CardID',
            'Date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
