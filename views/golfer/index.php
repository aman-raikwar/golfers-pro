<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\bootstrap\Modal;
use fedemotta\datatables\DataTables;
use app\models\GolfClub;

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
                            <div class="table-responsive">
                                <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <?php if (Yii::$app->user->identity->user_roleID == 1) { ?>
                                                <th>Primary Membership Golf Club</th>
                                            <?php } ?>
                                            <th>Gender</th>
                                            <th>Card Number</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($data)) { ?>
                                            <?php foreach ($data as $golfer) { ?>
                                                <tr>
                                                    <td><?= $golfer->golfer_id ?></td>
                                                    <td><?= Html::a($golfer->golfer_firstname, Url::to(['golfer/view', 'id' => $golfer->golfer_id]), ['class' => 'text-danger', 'title' => 'View Golfer Profile']); ?></td>
                                                    <td><?= Html::a($golfer->golfer_lastname, Url::to(['golfer/view', 'id' => $golfer->golfer_id]), ['class' => 'text-danger', 'title' => 'View Golfer Profile']); ?></td>
                                                    <?php if (Yii::$app->user->identity->user_roleID == 1) { ?>
                                                        <td>
                                                            <?php
                                                            if (!empty($golfer->golfer_firstClubID)) {
                                                                echo GolfClub::getGolfClubName($golfer->golfer_firstClubID);
                                                            } else {
                                                                echo '-';
                                                            }
                                                            ?>
                                                        </td>
                                                    <?php } ?>
                                                    <td>
                                                        <?php
                                                        if (!empty($golfer->golfer_gender)) {
                                                            echo ($golfer->golfer_gender == 'M') ? 'Male' : 'Female';
                                                        } else {
                                                            echo '-';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        $card = \app\models\RegistrationCards::findOne(['UserID' => $golfer->golfer_id]);
                                                        if (!empty($card)) {
                                                            echo $card->CardNumber;
                                                        } else {
                                                            echo '-';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <div class="button-list text-center">
                                                            <?=
                                                            Html::a('<i class="fa fa-search"></i>', Url::to(['golfer/view', 'id' => $golfer->golfer_id]), [
                                                                'title' => 'View the Golfer Profile',
                                                                'class' => 'btn btn-icon waves-effect waves-light btn-danger'
                                                            ])
                                                            ?>
                                                            <?php if (in_array(Yii::$app->user->identity->user_roleID, [1, 2])) { ?>
                                                                <?=
                                                                Html::a('<i class="fa fa-pencil"></i>', 'javascript:void(0);', [
                                                                    'title' => 'Edit the Profile',
                                                                    'class' => 'btn btn-icon waves-effect waves-light btn-warning link-golfer',
                                                                    'data-href' => Url::to(['golfer/update', 'id' => $golfer->golfer_id])
                                                                ])
                                                                ?>
                                                            <?php } ?>
                                                            <?=
                                                            Html::a('<span class="fa fa-remove"></span>', Url::to(['golfer/delete', 'id' => $golfer->golfer_id]), [
                                                                'title' => Yii::t('app', 'Delete the Profile'),
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

<?php
Modal::begin(['id' => 'golfer-modal', 'clientOptions' => ['backdrop' => 'static', 'keyboard' => false]]);
Modal::end();
?>