<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $searchModel app\models\GolferSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Golfers');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content-page">
    <div class="container-fluid">
        <div class="row top-row">
            <div class="col-12">
                <div class="portlet">
                    <div class="portlet-heading bg-inverse">
                        <h3 class="portlet-title">Golfers</h3>
                        <div class="portlet-widgets">
                            <?= Html::a('<i class="mdi mdi-plus"></i>', 'javascript:void(0);', ['class' => 'link-golfer', 'data-href' => Url::to(['golfer/create'])]) ?>
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
                                    'golfer_firstname',
                                    'golfer_lastname',
                                    [
                                        'attribute' => 'golfer_firstClubID',
                                        'label' => 'Primary Membership Golf Club',
                                        'content' => function ($data) {
                                            if (!empty($data->golfer_firstClubID)) {
                                                return $data->golfer_firstClubID;
                                            } else {
                                                return '';
                                            }
                                        }
                                    ],
                                    [
                                        'attribute' => 'golfer_gender',
                                        'content' => function ($data) {
                                            if (!empty($data->golfer_gender)) {
                                                return ($data->golfer_gender == 'M') ? 'Male' : 'Female';
                                            } else {
                                                return '';
                                            }
                                        }
                                    ],
                                    [
                                        'attribute' => 'golfer_countyCardNumber',
                                        'label' => 'Card Number'
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
                                                            'class' => 'btn btn-icon waves-effect waves-light btn-warning link-golfer',
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

<?php
Modal::begin(['id' => 'golfer-modal']);
Modal::end();
?>