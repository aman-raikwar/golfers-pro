
<?php

use yii\helpers\Html;
use yii\helpers\Url;
use app\models\GolfClub;
use app\models\Golfer;
use yii\bootstrap\Modal;

$this->title = Yii::t('app', 'Player Activity');
?>
<div class="content-page">

    <!-- content -->
    <div class="content">

        <!-- container -->
        <div class="container-fluid">
            <!-- Player Activity Table Row -->
            <div class="row top-row">
                <div class="col-12">
                    <div class="portlet">
                        <div class="portlet-heading bg-inverse">
                            <h3 class="portlet-title"><?= Html::encode($this->title); ?></h3>
                            <div class="portlet-widgets">
                                <?php if (Yii::$app->user->identity->user_roleID != 2) { ?>
                                    <?= Html::a('<i class="mdi mdi-plus"></i> Add Activity', 'javascript:void(0);', ['class' => 'link-golfer-activity', 'data-href' => Url::to(['playeractivity/create'])]) ?>
                                <?php } ?>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <!-- Add Golfer Modal End -->
                        <div id="bg-default" class="panel-collapse collapse in show">
                            <div class="portlet-body">
                                <div class="table-responsive">
                                    <!--The Golf Club Column should not be visible to the Golf Club, only Platform Admin-->
                                    <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Golf Club</th>
                                                <th>Golfer Name</th>
                                                <th>Home Club</th>
                                                <th>Date</th>
                                                <th>Time</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (!empty($data)) { ?>
                                                <?php foreach ($data as $activity) { ?>
                                                    <?php
                                                    $reader = \app\models\CardReaders::findOne(['ID' => $activity->ReaderID]);
                                                    if (!empty($reader)) {
                                                        $readerclub_name = GolfClub::getGolfClubName($reader->GolfCourse);
                                                        if (!empty($activity->card)) {
                                                            $homeclub_id = $activity->card->ClubID;
                                                            $homeclub_name = GolfClub::getGolfClubName($homeclub_id);
                                                            $golfer_id = $activity->card->UserID;
                                                            $golfer_name = Golfer::getGolferName($golfer_id);
                                                            if (!empty($golfer_name)) {
                                                                $date = date('d/m/Y', strtotime($activity->Date));
                                                                $time = date('H:i', strtotime($activity->Date));
                                                                ?>
                                                                <tr>
                                                                    <td><?= Html::a($readerclub_name, Url::to(['golf-club/view', 'id' => $reader->GolfCourse]), ['class' => 'text-danger']) ?></td>
                                                                    <td><?= Html::a($golfer_name, Url::to(['golfer/view', 'id' => $golfer_id]), ['class' => 'text-danger']) ?></td>
                                                                    <td><?= Html::a($homeclub_name, Url::to(['golf-club/view', 'id' => $homeclub_id]), ['class' => 'text-danger']) ?></td>
                                                                    <td><?= $date ?></td>
                                                                    <td><?= $time ?></td>
                                                                </tr>
                                                            <?php } ?>
                                                        <?php } ?>
                                                    <?php } ?>
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
Modal::begin(['id' => 'golfer-activity-modal', 'clientOptions' => ['backdrop' => 'static', 'keyboard' => false]]);
Modal::end();
?>