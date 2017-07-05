<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\bootstrap\Modal;

$this->title = Yii::t('app', 'Golf Clubs');
?>

<div class="content-page">
    <div class="content">
        <div class="container-fluid">
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
                                        'golfclub_name',
                                        'golfclub_id',
                                        [
                                            'label' => 'Club Admin Name',
                                            'content' => function($data) {
                                                return $data->user->user_username;
                                            }
                                        ],
                                        [
                                            'label' => 'Associated Golfers',
                                            'content' => function($data) {
                                                return '';
                                            }
                                        ],
                                        [
                                            'label' => 'Number of Check-ins',
                                            'content' => function($data) {
                                                return '';
                                            }
                                        ],
                                        [
                                            'class' => 'yii\grid\ActionColumn',
                                            'header' => 'Actions',
                                            'headerOptions' => ['style' => 'width:120px', 'class' => 'text-center'],
                                            'template' => '{update} {delete}',
                                            'buttons' => [
                                                'update' => function ($url, $model) {
                                                    return Html::a('<span class="fa fa-pencil"></span>', 'javascript:void(0);', [
                                                                'title' => Yii::t('app', 'Edit'),
                                                                'class' => 'btn btn-icon waves-effect waves-light btn-warning link-golf-club',
                                                                'data-href' => $url
                                                    ]);
                                                },
                                                'delete' => function ($url, $model) {
                                                    return Html::a('<span class="fa fa-remove"></span>', $url, [
                                                                'title' => Yii::t('app', 'Delete'),
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
Modal::begin(['id' => 'golf-club-modal']);
Modal::end();
?>