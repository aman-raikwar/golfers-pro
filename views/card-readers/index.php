<?php

use yii\helpers\Html;
use yii\helpers\Url;
use app\models\GolfClub;
use yii\bootstrap\Modal;

$this->title = Yii::t('app', 'Card Readers');
?>
<div class="content-page">
    <div class="content">
        <div class="container-fluid">
            <!-- Player Activity Table Row -->
            <div class="row top-row">
                <div class="col-12">
                    <div class="portlet">
                        <div class="portlet-heading bg-inverse">
                            <h3 class="portlet-title"><?= Html::encode($this->title) ?></h3>
                            <div class="portlet-widgets">
                                <?= Html::a('<i class="mdi mdi-plus"></i> Add Reader', 'javascript:void(0);', ['class' => 'link-add-card-readers', 'data-href' => Url::to(['card-readers/create'])]) ?>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div id="bg-default" class="panel-collapse collapse in show">
                            <div class="portlet-body">
                                <div class="table-responsive">
                                    <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Card Reader Number</th>
                                                <th>Golf Club</th>
                                                <th>Golf Club Number</th>
<!--                                                <th></th>-->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (!empty($data)) { ?>
                                                <?php foreach ($data as $reader) { ?>
                                                    <?php
                                                    $club_id = $reader->GolfCourse;
                                                    $club_name = GolfClub::getGolfClubName($club_id);
                                                    ?>
                                                    <tr>
                                                        <td><?= $reader->ReaderName ?></td>
                                                        <td><?= Html::a($club_name, Url::to(['golf-club/view', 'id' => $club_id]), ['class' => 'text-danger']) ?></td>
                                                        <td><?= $club_id ?></td>
<!--                                                        <td>
                                                            <div class="button-list pull-right">
                                                                <?= Html::a('<i class="fa fa-pencil"></i>', 'javascript:void(0);', ['class' => 'btn btn-icon waves-effect waves-light btn-warning link-edit-card-readers', 'data-href' => Url::to(['card-readers/update', 'id' => $reader->ID])]) ?>
                                                            </div>
                                                        </td>-->
                                                    </tr>
                                                <?php } ?>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- Player Activity Table Row End -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
Modal::begin(['id' => 'card-readers-modal', 'clientOptions' => ['backdrop' => 'static', 'keyboard' => false]]);
Modal::end();
?>