<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>
    <!-- Date Picker -->
        <link href="plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
  <section>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">

                        <div class="wrapper-page">
							<!-- Registration Form -->
                            <div class="account-pages">
                                <div class="account-box">
                                    <div class="account-logo-box bg-inverse">
                                        <h2 class="text-uppercase text-center">
                                            <a href="index.php" class="text-success">
                                                <span><img src="images/logo.png"></span>
                                            </a>
                                        </h2>
                                    </div>
                                    <div class="account-content">
                                        <h5 class="text-uppercase font-bold">Register for the Golfer Card</h5>
                                        <p>Fill out the form below and we will send you an acitivation link to your account. Once the deadline has been reached for your club, you will be notified when you can pick up your personalised Golfer Card from your Clubhouse.</p>
                                        <p>If your Golf Club is not in the list, please <a href="#" class="text-danger">click here</a> to find out how to join.</p>
                                        <hr/>
                                        <form class="form-horizontal" action="#">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="field-1" class="control-label">Which Golf Club are you a member of?</label>
                                                            <select class="form-control" id="field-1">
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
                                                            <input type="text" class="form-control" id="field-5">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="field-6" class="control-label">First Name</label>
                                                            <input type="text" class="form-control" id="field-6">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="field-7" class="control-label">Last Name</label>
                                                            <input type="text" class="form-control" id="field-7">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="field-8" class="control-label">Gender</label>
                                                            <select class="form-control" id="field-8">
                                                                <option>Female</option>
                                                                <option>Male</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="field-9" class="control-label">Date of Birth</label>
                                                            <!-- Select Date -->
                                                            <div>
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control" placeholder="mm/dd/yyyy" id="datepicker" id="field-9">
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
                                                            <input type="text" class="form-control" id="field-10">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="field-11" class="control-label">Password</label>
                                                            <input type="text" class="form-control" id="field-11">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="field-12" class="control-label">Confirm Password</label>
                                                            <input type="text" class="form-control" id="field-12">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="field-13" class="control-label">Contact Number</label>
                                                            <input type="text" class="form-control" id="field-13">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="field-14" class="control-label">Address Line 1</label>
                                                            <input type="text" class="form-control" id="field-14">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="field-15" class="control-label">Address Line 2</label>
                                                            <input type="text" class="form-control" id="field-15">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="field-16" class="control-label">Country</label>
                                                            <select class="form-control" id="field-16">
                                                                <option>England</option>
                                                                <option>Ireland</option>
                                                                <option>Northern Ireland</option>
                                                                <option>Scotland</option>
                                                                <option>Wales</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="field-17" class="control-label">County</label>
                                                            <select class="form-control" id="field-17">
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
                                                            <label for="field-18" class="control-label">Town</label>
                                                            <input type="text" class="form-control" id="field-18">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="field-19" class="control-label">Postcode</label>
                                                            <input type="text" class="form-control" id="field-19">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                	<div class="col-12">
                                                    	<div class="checkbox checkbox-success">
                                                            <input id="confirm-marketing" type="checkbox" checked="">
                                                            <label for="confirm-marketing">
                                                                I confirm I would like to receive <a href="#" class="text-danger">Relevant Information</a>.
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                    	<div class="checkbox checkbox-success">
                                                            <input id="confirm" type="checkbox" checked="">
                                                            <label for="confirm">
                                                                I confirm I have read and agree to the <a href="#" class="text-danger">Terms and Conditions</a>.
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                    	<hr/>
                                                    	<button class="btn btn-md btn-block btn-danger waves-effect waves-light" type="submit" data-toggle="modal" data-target="#registerSuccess">Register</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Registration Form End -->
                            <!-- Registration Success Modal -->
                                <div id="registerSuccess" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                <h4 class="modal-title" id="myModalLabel">Registration Success</h4>
                                            </div>
                                            <div class="modal-body">
                                                <p>Thank you for registering with The Golfer Card. We have sent you a confirmation email to activate your account.<br/>Follow the link and you will then be able to login.</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary waves-effect"><a href="confirmation.php" class="text-danger">Login Page</a></button>
                                                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <!-- Registration Success Modal End -->


                        </div>
                        <!-- end wrapper -->

                    </div>
                </div>
            </div>
          </section>
          <!-- END HOME -->