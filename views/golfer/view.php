<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Modal;

$this->title = $model->golfer_firstname . ' ' . $model->golfer_lastname;
?>
<div class="content-page">

    <!-- content -->
    <div class="content">

        <!-- container -->
        <div class="container-fluid">
            <div class="row top-row">
                <div class="col-lg-6">
                    <!-- Golfer Card Details -->
                    <div class="portlet">
                        <div class="portlet-heading bg-inverse">
                            <h3 class="portlet-title">My Golfer Card Details</h3>
                            <div class="portlet-widgets">
                                <?php if (in_array(Yii::$app->user->identity->user_roleID, [1, 2])) { ?>
                                    <?= Html::a('<i class="mdi mdi-pencil"></i>', 'javascript:void(0);', ['class' => 'link-golfer', 'data-href' => Url::to(['golfer/update', 'id' => $model->golfer_id])]) ?>
                                <?php } ?>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div id="bg-default" class="panel-collapse collapse in show">
                            <div class="portlet-body">
                                <table class="table table-striped" cellspacing="0" width="100%">
                                    <tbody>
                                        <tr>
                                            <td><strong>Name</strong></td>
                                            <td class="text-right"><?= $model->golfer_title ?> <?= $model->golfer_firstname ?> <?= $model->golfer_lastname ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Golfer Card Number</strong></td>
                                            <td class="text-right">
                                                <?php
                                                $golfer_id = $model->golfer_id;
                                                $card = \app\models\RegistrationCards::findOne(['UserID' => $golfer_id]);
                                                if (!empty($card)) {
                                                    echo $card->CardNumber;
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Golfer Card Membership</strong></td>
                                            <td class="text-right">Level 1</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Home Club</strong></td>
                                            <td class="text-right">
                                                <?php
                                                if (!empty($model->golfer_firstClubID)) {
                                                    echo app\models\GolfClub::getGolfClubName($model->golfer_firstClubID);
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Secondary Club</strong></td>
                                            <td class="text-right">
                                                <?php
                                                if (!empty($model->golfer_otherClubID)) {
                                                    echo app\models\GolfClub::getGolfClubName($model->golfer_otherClubID);
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- Golfer Card Details End -->
                    <?php if (Yii::$app->user->identity->user_roleID != 2) { ?>
                        <!-- Golfer Notes -->
                        <div class="portlet">
                            <div class="portlet-heading bg-inverse">
                                <h3 class="portlet-title">Golfer Notes</h3>
                                <div class="portlet-widgets">
                                    <?php if (in_array(Yii::$app->user->identity->user_roleID, [1, 2])) { ?>
                                        <?= Html::a('<i class="mdi mdi-pencil"></i>', 'javascript:void(0);', ['class' => 'link-golfer-notes', 'data-href' => Url::to(['golfer/golfer-notes', 'id' => $model->golfer_id])]) ?>
                                    <?php } ?>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div id="bg-default" class="panel-collapse collapse in show">
                                <div class="portlet-body">
                                    <p><?= $model->golfer_notes; ?></p>
                                </div>
                            </div>
                        </div>
                        <!-- Golfer Notes End -->
                    <?php } ?>
                </div>
                <div class="col-lg-6">
                    <!-- Account Details -->
                    <div class="portlet">
                        <div class="portlet-heading bg-inverse">
                            <h3 class="portlet-title">
                                My Account Details
                            </h3>
                            <div class="portlet-widgets">
                                <?php if (in_array(Yii::$app->user->identity->user_roleID, [1, 2])) { ?>
                                    <?= Html::a('<i class="mdi mdi-pencil"></i>', 'javascript:void(0);', ['class' => 'link-golfer', 'data-href' => Url::to(['golfer/update', 'id' => $model->golfer_id])]) ?>
                                <?php } ?>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div id="bg-default" class="panel-collapse collapse in show">
                            <div class="portlet-body">
                                <table class="table table-striped" cellspacing="0" width="100%">
                                    <tbody>
                                        <tr>
                                            <td><strong>Registered Email</strong></td>
                                            <td class="text-right"><a href="mailto:<?= $model->user->user_email ?>" class="text-danger"><?= $model->user->user_email ?></a></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Password</strong></td>
                                            <td class="text-right">**********
                                                <?php if (in_array(Yii::$app->user->identity->user_roleID, [1, 2])) { ?>
                                                    <br/><br/>
                                                    <?= Html::a('Change Password', 'javascript:void(0);', ['class' => 'btn btn-danger waves-effect waves-light link-golfer-change-password', 'data-href' => Url::to(['golfer/change-password', 'id' => $model->golfer_id])]) ?>
                                                <?php } ?>
                                            </td>                                            
                                        </tr>
                                    </tbody>
                                </table>
                                <table class="table table-striped" cellspacing="0" width="100%">
                                    <tbody>
                                        <tr>
                                            <td><strong>Contact Number</strong></td>
                                            <td class="text-right"><?= $model->golfer_phone ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Gender</strong></td>
                                            <td class="text-right">
                                                <?php
                                                if (!empty($model->golfer_gender)) {
                                                    echo $model->golfer_gender == 'M' ? 'Male' : 'Female';
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Date of Birth</strong></td>
                                            <td class="text-right">
                                                <?php
                                                if ($model->golfer_dateOfBirth == '0000-00-00') {
                                                    echo '';
                                                } else {
                                                    echo date('d-m-Y', strtotime($model->golfer_dateOfBirth));
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Address</strong></td>
                                            <td class="text-right">
                                                <?= $model->golfer_address1 ?>
                                                <br/>
                                                <?= $model->golfer_address2 ?>
                                                <br/>
                                                <?= $model->golfer_town ?>
                                                <br/>
                                                <?= \app\models\Country::findOne(['id' => $model->golfer_country])->long_name ?>
                                                <br/>
                                                <?php if (!empty($model->golfer_county)) { ?>
                                                    <?= \app\models\County::findOne(['id' => $model->golfer_county])->name ?>
                                                    <br/>
                                                <?php } ?>
                                                <?= $model->golfer_postCode ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- Account Details End -->
                </div>
            </div>
            <!-- container end -->
        </div>
        <!-- content end -->        
    </div>
</div>

<?php
Modal::begin(['id' => 'golfer-modal', 'clientOptions' => ['backdrop' => 'static', 'keyboard' => false]]);
Modal::end();
?>