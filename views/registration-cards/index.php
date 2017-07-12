<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\bootstrap\Modal;
use fedemotta\datatables\DataTables;

/* @var $this yii\web\View */
/* @var $searchModel app\models\GolferSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Golfer Cards');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content-page">
    <div class="container-fluid">
        <div class="row top-row">
            <div class="col-12">
                <div class="portlet">
                    <div class="portlet-heading bg-inverse">
                        <h3 class="portlet-title"><?= $this->title ?></h3>
                        <div class="portlet-widgets">
                            <?php if (Yii::$app->user->identity->user_roleID == 3) { ?>
                                <?= Html::a('<i class="fa fa-universal-access"></i> Request Cards', 'javascript:void(0);', ['class' => 'link-request-cards', 'data-href' => Url::to(['golfer/create'])]) ?>
                            <?php } ?>

                            <?php if (Yii::$app->user->identity->user_roleID == 1) { ?>
                                <?= Html::a('<i class="mdi mdi-plus"></i> Add Cards', 'javascript:void(0);', ['class' => 'link-registration-cards', 'data-href' => Url::to(['registration-cards/create'])]) ?>
                            <?php } ?>
                        </div>
                        <div class="clearfix"></div>
                    </div>                        
                    <div id="bg-default" class="panel-collapse collapse in show">
                        <div class="portlet-body">                            
                            <?=
                            DataTables::widget([
                                'dataProvider' => $dataProvider,
                                'filterModel' => $searchModel,
                                'columns' => [
                                    ['class' => 'yii\grid\SerialColumn', 'contentOptions' => ['style' => 'width: 20px;', 'class' => 'text-center'],],
                                    'CardNumber',
                                    [
                                        'attribute' => 'ClubID',
                                        'label' => 'Golf Club',
                                        'visible' => Yii::$app->user->identity->user_roleID == 1 ? TRUE : FALSE,
                                        'content' => function($data) {
                                            if ($data->ClubID != 0) {
                                                $clubName = \app\models\RegistrationCards::getClubName($data->ClubID);
                                                return Html::a($clubName, Url::to(['golf-club/view', 'id' => $data->ClubID]), ['title' => Yii::t('app', 'View the Club Profile'), 'class' => 'text-danger']);
                                            } else {
                                                return '-';
                                            }
                                        }
                                    ],
                                    [
                                        'attribute' => 'UserID',
                                        'label' => 'First Name',
                                        'content' => function($data) {
                                            if ($data->UserID != 0) {
                                                //return $data->user->user_username;
                                                //return Html::a($data->UserID, Url::to(['golf-club/view', 'id' => $data->UserID]), ['title' => Yii::t('app', 'View the Golfer Profile'), 'class' => 'text-danger']);
                                            } else {
                                                return '-';
                                            }
                                        }
                                    ],
                                    [
                                        'attribute' => 'UserID',
                                        'label' => 'Last Name',
                                        'content' => function($data) {
                                            if ($data->UserID != 0) {
                                                return Html::a($data->UserID, Url::to(['golf-club/view', 'id' => $data->UserID]), ['title' => Yii::t('app', 'View the Golfer Profile'), 'class' => 'text-danger']);
                                            } else {
                                                return '-';
                                            }
                                        }
                                    ],
                                    'RegisteredDate',
                                    [
                                        'class' => 'yii\grid\ActionColumn',
                                        'visible' => false,
                                        'header' => 'Actions',
                                        'headerOptions' => ['style' => 'width:160px', 'class' => 'text-center'],
                                        'contentOptions' => ['class' => 'text-center'],
                                        'template' => '{view} {update} {delete}',
                                        'buttons' => [
                                            'view' => function ($url, $model) {
                                                return Html::a('<span class="fa fa-search"></span>', $url, [
                                                            'title' => Yii::t('app', 'View the Golfer Profile'),
                                                            'class' => 'btn btn-icon waves-effect waves-light btn-danger'
                                                ]);
                                            },
                                            'update' => function ($url, $model) {
                                                return Html::a('<span class="fa fa-pencil"></span>', 'javascript:void(0);', [
                                                            'title' => Yii::t('app', 'Edit the Golfer'),
                                                            'class' => 'btn btn-icon waves-effect waves-light btn-warning link-golfer',
                                                            'data-href' => $url
                                                ]);
                                            },
                                            'delete' => function ($url, $model) {
                                                return Html::a('<span class="fa fa-remove"></span>', $url, [
                                                            'title' => Yii::t('app', 'Delete the Golfer'),
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
Modal::begin(['id' => 'registration-cards-modal', 'clientOptions' => ['backdrop' => 'static', 'keyboard' => false]]);
Modal::end();
?>