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
                                <?= Html::a('<i class="mdi mdi-pencil"></i>', 'javascript:void(0);', ['class' => 'link-golfer', 'data-href' => Url::to(['golfer/update', 'id' => $model->golfer_id])]) ?>
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
                                                $golfer_id = $model->golfer_userID;
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
                                                    echo $model->getGolfClubName($model->golfer_firstClubID);
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Secondary Club</strong></td>
                                            <td class="text-right">
                                                <?php
                                                if (!empty($model->golfer_otherClubID)) {
                                                    echo $model->getGolfClubName($model->golfer_otherClubID);
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
                    <!-- Golfer Notes -->
                    <div class="portlet">
                        <div class="portlet-heading bg-inverse">
                            <h3 class="portlet-title">Golfer Notes</h3>
                            <div class="portlet-widgets">
                                <a href="#" data-toggle="modal" data-target="#editNotes"><i class="mdi mdi-pencil"></i></a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div id="bg-default" class="panel-collapse collapse in show">
                            <div class="portlet-body">
                                <p>This area of the screen is only visible to the Golf Pro or Golfer Card admin. It cannot be seen by the Golfer themselves.</p>
                            </div>
                        </div>
                    </div>
                    <!-- Golfer Notes End -->
                </div>
                <div class="col-lg-6">
                    <!-- Account Details -->
                    <div class="portlet">
                        <div class="portlet-heading bg-inverse">
                            <h3 class="portlet-title">
                                My Account Details
                            </h3>
                            <div class="portlet-widgets">
                                <a href="#" data-toggle="modal" data-target="#editDetails"><i class="mdi mdi-pencil"></i></a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div id="bg-default" class="panel-collapse collapse in show">
                            <div class="portlet-body">
                                <table class="table table-striped" cellspacing="0" width="100%">
                                    <tbody>
                                        <tr>
                                            <td><strong>Registered Email</strong></td>
                                            <td class="text-right"><a href="mailto:davidwatkins@onegolfnetwork.co.uk" class="text-danger">davidwatkins@onegolfnetwork.co.uk</a></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Password</strong></td>
                                            <td class="text-right">**********
                                                <br/><br/><button class="btn btn-danger waves-effect waves-light" data-toggle="modal" data-target="#changePassword">Change Password</button></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <!-- Change Password Modal -->
                                <div id="changePassword" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">�</button>
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
                                                <button type="button" class="btn btn-secondary waves-effect data-dismiss="modal"">Cancel</button>
                                                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Set Password</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Change Password Modal End -->
                                <!-- Edit Details Modal -->
                                <div id="editDetails" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">�</button>
                                                <h4 class="modal-title" id="myModalLabel">Edit Details</h4>
                                            </div>
                                            <div class="modal-body">
                                                <form class="form-horizontal" action="#">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="field-1" class="control-label">Which Golf Club are you a member of?</label>
                                                                <select class="form-control" id="field-1">
                                                                    <option>Radyr Golf Club</option>
                                                                    <option>Aberdare Golf Club</option>
                                                                    <option>Aberdovey Golf Club</option>
                                                                    <option>Abergele Golf Club</option>
                                                                    <option>Abersoch Golf Club</option>
                                                                    <option>Aberystwyth Golf Club</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="field-1" class="control-label">Member of another Club?</label>
                                                                <select class="form-control" id="field-2">
                                                                    <option>No</option>
                                                                    <option>Yes</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="field-3" class="control-label">Select Golf Club</label>
                                                                <select class="form-control" id="field-3">
                                                                    <option>Select</option>
                                                                    <option>Aberdare Golf Club</option>
                                                                    <option>Aberdovey Golf Club</option>
                                                                    <option>Abergele Golf Club</option>
                                                                    <option>Abersoch Golf Club</option>
                                                                    <option>Aberystwyth Golf Club</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="field-4" class="control-label">Golfer Card Membership Category</label>
                                                                <select class="form-control" id="field-4">
                                                                    <option>Level 1</option>
                                                                    <option>Level 2</option>
                                                                    <option>Level 3</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="field-5" class="control-label">Title</label>
                                                                <input type="text" class="form-control" id="field-5" value="Mr">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="field-6" class="control-label">First Name</label>
                                                                <input type="text" class="form-control" id="field-6" value="David">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="field-7" class="control-label">Last Name</label>
                                                                <input type="text" class="form-control" id="field-7" value="Watkins">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="field-8" class="control-label">Gender</label>
                                                                <select class="form-control" id="field-8" value="Male">
                                                                    <option>Male</option>
                                                                    <option>Female</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="field-9" class="control-label">Date of Birth</label>
                                                                <!-- Select Date -->
                                                                <div>
                                                                    <div class="input-group">
                                                                        <input type="text" class="form-control" placeholder="mm/dd/yyyy" id="datepicker" id="field-9" value="04/12/1986">
                                                                        <span class="input-group-addon bg-custom b-0"><i class="mdi mdi-calendar text-white"></i></span>
                                                                    </div>
                                                                </div>
                                                                <!-- Select Date End -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="field-10" class="control-label">Email</label>
                                                                <input type="text" class="form-control" id="field-10" value="davidwatkins@onegolfnetwork.co.uk">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="field-11" class="control-label">Contact Number</label>
                                                                <input type="text" class="form-control" id="field-11" value="01773 278 372">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="field-12" class="control-label">Address Line 1</label>
                                                                <input type="text" class="form-control" id="field-12" value="Cherry Cottage">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="field-13" class="control-label">Address Line 2</label>
                                                                <input type="text" class="form-control" id="field-13" value="87 Avenue Road">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="field-14" class="control-label">Country</label>
                                                                <select class="form-control" id="field-14">
                                                                    <option>Wales</option>
                                                                    <option>England</option>
                                                                    <option>Ireland</option>
                                                                    <option>Northern Ireland</option>
                                                                    <option>Scotland</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="field-15" class="control-label">County</label>
                                                                <select class="form-control" id="field-15">
                                                                    <option>South Glamorgan</option>
                                                                    <option>Bedfordshire</option>
                                                                    <option>Berkshire</option>
                                                                    <option>Bristol</option>
                                                                    <option>Buckinghamshire</option>
                                                                    <option>Cambridgeshire</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="field-16" class="control-label">Town</label>
                                                                <input type="text" class="form-control" id="field-16" value="Cardiff">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="field-17" class="control-label">Postcode</label>
                                                                <input type="text" class="form-control" id="field-17" value="CF10 3AD">
                                                            </div>
                                                        </div>
                                                    </div>
                                            </div>
                                            </form>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary waves-effect data-dismiss="modal"">Cancel</button>
                                                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Update Details</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Edit Details Modal End -->
                                <!-- Edit Notes Modal -->
                                <div id="editNotes" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fi-cross"></i></button>
                                                <h4 class="modal-title" id="myModalLabel">Edit Golfer Notes</h4>
                                            </div>
                                            <div class="modal-body">
                                                <form class="form-horizontal" action="#">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="field-1" class="control-label">Golfer Notes</label>
                                                                <textarea class="form-control" id="field-1" value="Notes can be written and added to within this box here."></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Cancel</button>
                                                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Update Notes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Edit Notes Modal End -->
                                <table class="table table-striped" cellspacing="0" width="100%">
                                    <tbody>
                                        <tr>
                                            <td><strong>Contact Number</strong></td>
                                            <td class="text-right"><?= $model->golfer_phone ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Gender</strong></td>
                                            <td class="text-right"><?= $model->golfer_gender == 'M' ? 'Male' : 'Female' ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Date of Birth</strong></td>
                                            <td class="text-right"><?= $model->golfer_dateOfBirth ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Address</strong></td>
                                            <td class="text-right">Cherry Cottage<br/>87 Avenue Road<br/>Cardiff<br/>South Glamorgan<br/>CF10 3AD<br/>Wales</td>
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