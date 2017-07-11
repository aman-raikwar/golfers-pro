<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\bootstrap\Modal;
use app\models\GolfClub;
use app\models\Golfer;

$this->title = Yii::t('app', 'Golf Clubs');
?>

<div class="content-page">
    <div class="content">
        <div class="container-fluid">
            <!-- Top Stat Row -->
            <div class="row top-row">
                <!-- col -->
                <div class="col-lg-4 col-md-6">
                    <div class="card-box widget-box-two widget-two-danger">
                        <i class="mdi mdi-book widget-two-icon"></i>
                        <div class="wigdet-two-content">
                            <p class="m-0 text-uppercase font-bold font-secondary text-overflow" title="Statistics">Number of Golf Clubs</p>
                            <h2 class="font-600"><?= GolfClub::find()->count(); ?></h2>
                            <p class="m-0">Since <?= date('F Y'); ?></p>
                        </div>
                    </div>
                </div>
                <!-- end col -->
                <!-- col -->
                <div class="col-lg-4 col-md-6">
                    <div class="card-box widget-box-two widget-two-danger">
                        <i class="mdi mdi-account-multiple widget-two-icon"></i>
                        <div class="wigdet-two-content">
                            <p class="m-0 text-uppercase font-bold font-secondary text-overflow" title="Statistics">Registered Golfers</p>
                            <h2 class="font-600"><?= Golfer::find()->count(); ?></h2>
                            <p class="m-0">Since <?= date('F Y'); ?></p>
                        </div>
                    </div>
                </div>
                <!-- end col -->
                <!-- col -->
                <div class="col-lg-4 col-md-6">
                    <div class="card-box widget-box-two widget-two-danger">
                        <i class="mdi mdi-check widget-two-icon"></i>
                        <div class="wigdet-two-content">
                            <p class="m-0 text-uppercase font-bold font-secondary text-overflow" title="Statistics">Number of Check-ins</p>
                            <h2 class="font-600">0</h2>
                            <p class="m-0">Since <?= date('F Y'); ?></p>
                        </div>
                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- Top Stat Row End-->
            <div class="row top-row">
                <div class="col-12">
                    <div class="portlet">
                        <div class="portlet-heading bg-inverse">
                            <h3 class="portlet-title"><?= Html::encode($this->title) ?></h3>
                            <div class="portlet-widgets">
                                <?= Html::a('<i class="mdi mdi-plus"></i>', 'javascript:void(0);', ['class' => 'link-golf-club', 'data-href' => Url::to(['golf-club/create'])]) ?>
                            </div>
                            <div class="clearfix"></div>
                        </div>                        
                        <div id="bg-default" class="panel-collapse collapse in show">
                            <div class="portlet-body">                                
                                <?=
                                GridView::widget([
                                    'dataProvider' => $dataProvider,
                                    //'filterModel' => $searchModel,
                                    'tableOptions' => ['class' => 'table  table-bordered table-hover'],
                                    'layout' => '{items}{summary}{pager}',
                                    'columns' => [
                                        ['class' => 'yii\grid\SerialColumn', 'contentOptions' => ['style' => 'width: 20px;', 'class' => 'text-center'],],
                                        [
                                            'attribute' => 'golfclub_name',
                                            'content' => function($data) {
                                                return Html::a($data->golfclub_name, Url::to(['golf-club/view', 'id' => $data->golfclub_id]), ['title' => Yii::t('app', 'View the Club Profile'), 'class' => 'text-danger']);
                                            }
                                        ],
                                        [
                                            'attribute' => 'golfclub_id',
                                            'headerOptions' => ['style' => 'width:120px', 'class' => 'text-center'],
                                            'contentOptions' => ['class' => 'text-center']
                                        ],
                                        [
                                            'label' => 'Club Admin Name',
                                            'content' => function($data) {
                                                return $data->user->user_username;
                                            }
                                        ],
                                        [
                                            'label' => 'Associated Golfers',
                                            'headerOptions' => ['style' => 'width:160px', 'class' => 'text-center'],
                                            'contentOptions' => ['class' => 'text-center'],
                                            'content' => function($data) {
                                                return $data->getCountOfGolfers($data->golfclub_id);
                                            }
                                        ],
                                        [
                                            'label' => 'Number of Check-ins',
                                            'headerOptions' => ['style' => 'width:160px', 'class' => 'text-center'],
                                            'contentOptions' => ['class' => 'text-center'],
                                            'content' => function($data) {
                                                return '';
                                            }
                                        ],
                                        [
                                            'class' => 'yii\grid\ActionColumn',
                                            'header' => 'Actions',
                                            'headerOptions' => ['style' => 'width:160px', 'class' => 'text-center'],
                                            'contentOptions' => ['class' => 'text-center'],
                                            'template' => '{view} {update} {delete}',
                                            'buttons' => [
                                                'view' => function ($url, $model) {
                                                    return Html::a('<span class="fa fa-search"></span>', $url, [
                                                                'title' => Yii::t('app', 'View the Club Profile'),
                                                                'class' => 'btn btn-icon waves-effect waves-light btn-danger'
                                                    ]);
                                                },
                                                'update' => function ($url, $model) {
                                                    return Html::a('<span class="fa fa-pencil"></span>', 'javascript:void(0);', [
                                                                'title' => Yii::t('app', 'Edit the Club'),
                                                                'class' => 'btn btn-icon waves-effect waves-light btn-warning link-golf-club',
                                                                'data-href' => $url
                                                    ]);
                                                },
                                                'delete' => function ($url, $model) {
                                                    return Html::a('<span class="fa fa-remove"></span>', $url, [
                                                                'title' => Yii::t('app', 'Delete the Club'),
                                                                'class' => 'btn btn-icon waves-effect waves-light btn-inverse',
                                                                'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                                                                'data-method' => 'post',
                                                    ]);
                                                }
                                            ]
                                        ]
                                    ],
                                ]);
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
Modal::begin(['id' => 'golf-club-modal', 'clientOptions' => ['backdrop' => 'static', 'keyboard' => false]]);
Modal::end();
?>