<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\bootstrap\Modal;
use fedemotta\datatables\DataTables;
use app\models\GolfClub;
use app\models\Golfer;

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
                                <?= Html::a('<i class="fa fa-universal-access"></i> Request Cards', 'javascript:void(0);', ['class' => 'link-request-cards', 'data-href' => Url::to(['registration-cards/request-cards'])]) ?>
                            <?php } ?>

                            <?php if (Yii::$app->user->identity->user_roleID == 1) { ?>
                                <?= Html::a('<i class="mdi mdi-plus"></i> Add Cards', 'javascript:void(0);', ['class' => 'link-registration-cards', 'data-href' => Url::to(['registration-cards/create'])]) ?>
                            <?php } ?>
                        </div>
                        <div class="clearfix"></div>
                    </div>                        
                    <div id="bg-default" class="panel-collapse collapse in show">
                        <div class="portlet-body">                            
                            <div class="table-responsive">
                                <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Card Number</th>
                                            <th>Golf Club</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Registered</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($data)) { ?>
                                            <?php foreach ($data as $card) { ?>
                                                <?php
                                                $club_id = $card->ClubID;
                                                $club_name = GolfClub::getGolfClubName($club_id);

                                                $first_name_link = '-';
                                                $last_name_link = '-';
                                                if ($card->UserID != 0) {
                                                    $golfer = Golfer::findOne($card->UserID);
                                                    if (!empty($golfer)) {
                                                        $first_name = $golfer->golfer_firstname;
                                                        $last_name = $golfer->golfer_lastname;

                                                        $first_name_link = Html::a($first_name, Url::to(['golfer/view', 'id' => $card->UserID]), ['title' => Yii::t('app', 'View the Golfer Profile'), 'class' => 'text-danger']);
                                                        $last_name_link = Html::a($last_name, Url::to(['golfer/view', 'id' => $card->UserID]), ['title' => Yii::t('app', 'View the Golfer Profile'), 'class' => 'text-danger']);
                                                    }
                                                }
                                                ?>
                                                <tr>
                                                    <td><?= $card->CardNumber ?></td>
                                                    <td><?= Html::a($club_name, Url::to(['golf-club/view', 'id' => $club_id]), ['class' => 'text-danger']) ?></td>
                                                    <td><?= $first_name_link ?></td>
                                                    <td><?= $last_name_link ?></td>
                                                    <td>
                                                        <?php if (!empty($card->RegisteredDate) && !empty(strtotime($card->RegisteredDate))) { ?>
                                                            <?= date('d/m/Y', strtotime($card->RegisteredDate)) ?>
                                                        <?php } ?>
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

<?php
Modal::begin(['id' => 'registration-cards-modal', 'clientOptions' => ['backdrop' => 'static', 'keyboard' => false]]);
Modal::end();
?>