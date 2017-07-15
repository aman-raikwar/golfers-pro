<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Modal;

$this->title = $model->golfclub_name;
?>
<div class="content-page">
    <!-- content -->
    <div class="content">
        <!-- container -->
        <div class="container-fluid">
            <div class="row top-row">
                <div class="col-lg-6">
                    <!-- Golf Club Details -->
                    <div class="portlet">
                        <div class="portlet-heading bg-inverse">
                            <h3 class="portlet-title">Club Details</h3>
                            <div class="portlet-widgets">
                                <?= Html::a('<i class="mdi mdi-pencil"></i>', 'javascript:void(0);', ['class' => 'link-golf-club', 'data-href' => Url::to(['golf-club/update', 'id' => $model->golfclub_id])]) ?>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <?php
                        $img_url = $model->golfclub_logo;
                        if (!empty($img_url)) {
                            $img_url = Yii::$app->request->baseUrl . '/uploads/' . $img_url;
                            echo '<img src="' . $img_url . '" class="club-image">';
                        }
                        ?>
                        <div id="bg-default" class="panel-collapse collapse in show">
                            <div class="portlet-body">
                                <div class="row">
                                    <div class="col-4">
                                        <h4 class="text-center"><?= $model->golfclub_holes ?></h4>
                                        <h5 class="text-center">Holes</h5>
                                    </div>
                                    <div class="col-4">
                                        <h4 class="text-center"><?= $model->golfclub_par ?></h4>
                                        <h5 class="text-center">Par</h5>
                                    </div>
                                    <div class="col-4">
                                        <h4 class="text-center"><?= $model->golfclub_yardage ?></h4>
                                        <h5 class="text-center">Yards</h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h4><?= $model->golfclub_name ?></h4>                                        
                                        <h5><?= $model->golfclub_town ?></h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <p><?= $model->golfclub_description ?></p>
                                        <p>Green Fees from <strong>£<?= $model->golfclub_greenFeeFrom ?></strong> to <strong>£<?= $model->golfclub_greenFeeTo ?></strong>.</p>
                                        <hr/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <a class="btn waves-effect waves-light btn-danger btn-block" target="_blank" href="<?= $model->golfclub_websiteUrl ?>">Club Website</a>
                                    </div>
                                    <div class="col-6">
                                        <button type="button" class="btn waves-effect waves-light btn-success btn-block" href="#">Go Play Golf</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Golf Club Details End -->
                </div>
                <div class="col-lg-6">
                    <!-- Golf Club Facilities -->
                    <div class="portlet">
                        <div class="portlet-heading bg-inverse">
                            <h3 class="portlet-title">Facilities</h3>
                            <div class="portlet-widgets">
                                <?= Html::a('<i class="mdi mdi-pencil"></i>', 'javascript:void(0);', ['class' => 'link-golf-club', 'data-href' => Url::to(['golf-club/update', 'id' => $model->golfclub_id])]) ?>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div id="bg-default" class="panel-collapse collapse in show">
                            <div class="portlet-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <h5>Course & Club Facilities</h5>
                                        <hr/>
                                        <p><i class="fa fa-check text-success"></i> Buggy Hire<br/>
                                            <i class="fa fa-times text-danger"></i> Trolley Hire<br/>
                                            <i class="fa fa-check text-success"></i> Society Days<br/>
                                            <i class="fa fa-check text-success"></i> Venue Hire<br/>
                                            <i class="fa fa-times text-danger"></i> Showers<br/>
                                            <i class="fa fa-check text-success"></i> Snooker<br/>
                                            <i class="fa fa-times text-danger"></i> Gym<br/>
                                            <i class="fa fa-check text-success"></i> Swimming Pool<br/>
                                            <i class="fa fa-times text-danger"></i> Accommodation Hire</p>
                                    </div>
                                    <div class="col-lg-6">
                                        <h5>Practice Facilities</h5>
                                        <hr/>
                                        <p><i class="fa fa-check text-success"></i> Driving Range<br/>
                                            <i class="fa fa-times text-danger"></i> Practice Ground<br/>
                                            <i class="fa fa-check text-success"></i> Practice Net<br/>
                                            <i class="fa fa-check text-success"></i> Putting Green<br/>
                                            <i class="fa fa-times text-danger"></i> Swing Studio</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Facilities End -->
                    <!-- Account Details -->
                    <div class="portlet">
                        <div class="portlet-heading bg-inverse">
                            <h3 class="portlet-title">Contact Details</h3>
                            <div class="portlet-widgets">
                                <?= Html::a('<i class="mdi mdi-pencil"></i>', 'javascript:void(0);', ['class' => 'link-golf-club', 'data-href' => Url::to(['golf-club/update', 'id' => $model->golfclub_id])]) ?>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div id="bg-default" class="panel-collapse collapse in show">
                            <div class="portlet-body">
                                <table class="table table-striped" cellspacing="0" width="100%">
                                    <tbody>
                                        <tr>
                                            <td><strong>Contact Email</strong></td>
                                            <td class="text-right"><a href="mailto:#" class="text-danger"><?= $model->user->user_email ?></a></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Contact Number</strong></td>
                                            <td class="text-right"><?= $model->golfclub_phone ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Facebook Page</strong></td>
                                            <td class="text-right"><a href="#" class="text-danger"><?= $model->golfclub_facebookUrl ?></a></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Twitter Page</strong></td>
                                            <td class="text-right"><a href="#" class="text-danger"><?= $model->golfclub_twitterUrl ?></a></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Address</strong></td>
                                            <td class="text-right">
                                                <?= $model->golfclub_address1 ?>
                                                <br/>
                                                <?= $model->golfclub_address2 ?>
                                                <br/>
                                                <?= $model->golfclub_town ?>
                                                <br/>
                                                <?= \app\models\Country::findOne(['id' => $model->golfclub_countryID])->long_name ?>
                                                <br/>
                                                <?= $model->golfclub_postCode ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"><strong>Directions</strong><br/><?= $model->golfclub_addressNotes ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- Contact Details End -->
                    <!-- Account Details -->
                    <div class="portlet">
                        <div class="portlet-heading bg-inverse">
                            <h3 class="portlet-title">My Account Details</h3>
                            <div class="portlet-widgets">
                                <a href="#" data-toggle="modal" data-target="#changePassword"><i class="mdi mdi-pencil"></i></a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div id="bg-default" class="panel-collapse collapse in show">
                            <div class="portlet-body">
                                <table class="table table-striped" cellspacing="0" width="100%">
                                    <tbody>
                                        <tr>
                                            <td><strong>Username</strong></td>
                                            <td class="text-right"><?= $model->user->user_username ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Registered Email</strong></td>
                                            <td class="text-right"><a href="mailto:<?= $model->user->user_email ?>" class="text-danger"><?= $model->user->user_email ?></a></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Password</strong></td>
                                            <td class="text-right">**********
                                                <br/><br/>
                                                <button class="btn btn-danger waves-effect waves-light" data-toggle="modal" data-target="#changePassword">Change Password</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- Account Details End -->
                    <!-- Change Password Modal -->
                    <div id="changePassword" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fi-cross"></i></button>
                                    <h4 class="modal-title" id="myModalLabel">Change Password</h4>
                                </div>
                                <div class="modal-body">
                                    <form class="form-horizontal" action="#">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="field-1" class="control-label">New Password</label>
                                                    <input type="text" class="form-control" id="field-1">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="field-2" class="control-label">Confirm New Password</label>
                                                    <input type="text" class="form-control" id="field-2">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Cancel</button>
                                    <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Set Password</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Change Password Modal End -->                    
                </div>
            </div>
            <!-- container end -->
        </div>
        <!-- content end -->        
    </div>
</div>

<?php
Modal::begin(['id' => 'golf-club-modal', 'clientOptions' => ['backdrop' => 'static', 'keyboard' => false]]);
Modal::end();
?>