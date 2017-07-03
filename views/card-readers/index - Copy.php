<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CardReadersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Card Readers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card-readers-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Card Readers', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID',
            'ReaderName',
            'GolfCourse',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
