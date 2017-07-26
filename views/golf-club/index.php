<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\bootstrap\Modal;
use app\models\GolfClub;
use app\models\Golfer;
use fedemotta\datatables\DataTables;

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
                            <h2 class="font-600"><?= GolfClub::getCheckInsCount(); ?></h2>
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
                                <div class="table-responsive">
                                    <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Club Name</th>
                                                <th>Club Number</th>
                                                <th>Club Admin Name</th>
                                                <th>Associated Golfers</th>
                                                <th>Number of Check-ins</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (!empty($data)) { ?>
                                                <?php foreach ($data as $club) { ?>
                                                    <?php
//                                                    $club_id = $reader->GolfCourse;
//                                                    $club_name = GolfClub::getGolfClubName($club_id);
                                                    ?>
                                                    <tr>
                                                        <td><?= Html::a($club->golfclub_name, Url::to(['golf-club/view', 'id' => $club->golfclub_id]), ['class' => 'text-danger', 'title' => 'View the Club Profile']) ?></td>
                                                        <td><?= $club->golfclub_id ?></td>
                                                        <td><?= $club->user->user_username ?></td>
                                                        <td><?= $club->getCountOfGolfers($club->golfclub_id) ?></td>
                                                        <td><?= $club->getCheckInsCount($club->golfclub_id) ?></td>
                                                        <td>
                                                            <div class="button-list pull-right">
                                                                <?=
                                                                Html::a('<i class="fa fa-search"></i>', Url::to(['golf-club/view', 'id' => $club->golfclub_id]), [
                                                                    'title' => 'View the Club Profile',
                                                                    'class' => 'btn btn-icon waves-effect waves-light btn-danger'
                                                                ])
                                                                ?>
                                                                <?=
                                                                Html::a('<i class="fa fa-pencil"></i>', 'javascript:void(0);', [
                                                                    'title' => 'Edit the Club',
                                                                    'class' => 'btn btn-icon waves-effect waves-light btn-warning link-golf-club',
                                                                    'data-href' => Url::to(['golf-club/update', 'id' => $club->golfclub_id])
                                                                ])
                                                                ?>
                                                                <?=
                                                                Html::a('<span class="fa fa-remove"></span>', Url::to(['golf-club/delete', 'id' => $club->golfclub_id]), [
                                                                    'title' => Yii::t('app', 'Delete the Club'),
                                                                    'class' => 'btn btn-icon waves-effect waves-light btn-inverse',
                                                                    'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                                                                    'data-method' => 'post',
                                                                    'style' => "display: none;"
                                                                ]);
                                                                ?>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
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