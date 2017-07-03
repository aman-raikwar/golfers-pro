
<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
?>
<div class="content-page">

    <!-- content -->
    <div class="content">

        <!-- container -->
        <div class="container-fluid">
            <!-- Top Stat Row -->
            <div class="row top-row">
                <!-- col -->
                <div class="col-lg-4 col-md-6">
                    <div class="card-box widget-box-two widget-two-danger">
                        <i class="mdi mdi-book widget-two-icon"></i>
                        <div class="wigdet-two-content">
                            <p class="m-0 text-uppercase font-bold font-secondary text-overflow" title="Statistics">Number of Golf Clubs</p>
                            <h2 class="font-600">65841</h2>
                            <p class="m-0">Since June 2017</p>
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
                            <h2 class="font-600">236521</h2>
                            <p class="m-0">Since June 2017</p>
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
                            <h2 class="font-600">563698</h2>
                            <p class="m-0">Since June 2017</p>
                        </div>
                    </div>
                </div>
                <!-- end col -->

            </div>
            <!-- Top Stat Row End-->
            <!-- Golf Course Table Row -->
            <div class="row">
                <div class="col-12">
                    <div class="portlet">
                        <div class="portlet-heading bg-inverse">
                            <h3 class="portlet-title">
                                Golf Club Overview
                            </h3>
                            <div class="portlet-widgets">
                                <a href="#" data-toggle="modal" data-target="#myModal"><i class="mdi mdi-plus"></i></a>
                            </div>
                            <div class="clearfix"></div>
                            <!-- Add Golf Club Modal -->
                            <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fi-cross"></i></button>
                                            <h4 class="modal-title" id="myModalLabel">Add a Golf Club</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="field-1" class="control-label"> Golf Club Name</label>
                                                        <input type="text" class="form-control" id="field-1">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="field-2" class="control-label">Admin Login</label>
                                                        <input type="text" class="form-control" id="field-2">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="field-3" class="control-label">Email Address</label>
                                                        <input type="text" class="form-control" id="field-3">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="field-4" class="control-label">Password</label>
                                                        <input type="text" class="form-control" id="field-4">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="field-5" class="control-label">Repeat Password</label>
                                                        <input type="text" class="form-control" id="field-5">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="field-6" class="control-label">Address Line 1</label>
                                                        <input type="text" class="form-control" id="field-6">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="field-7" class="control-label">Address Line 2</label>
                                                        <input type="text" class="form-control" id="field-7">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="field-8" class="control-label">Country</label>
                                                        <select class="form-control" id="field-8">
                                                            <option>England</option>
                                                            <option>Ireland</option>
                                                            <option>Northern Ireland</option>
                                                            <option>Scotland</option>
                                                            <option>Wales</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="field-9" class="control-label">County</label>
                                                        <select class="form-control" id="field-9">
                                                            <option>Bedfordshire</option>
                                                            <option>Berkshire</option>
                                                            <option>Bristol</option>
                                                            <option>Buckinghamshire</option>
                                                            <option>Cambridgeshire</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="field-10" class="control-label">Town</label>
                                                        <input type="text" class="form-control" id="field-10">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="field-11" class="control-label">Postcode</label>
                                                        <input type="text" class="form-control" id="field-11">
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group no-margin">
                                                        <label for="field-12" class="control-label">Address Note</label>
                                                        <textarea class="form-control" id="field-12" placeholder="Include directions if need be."></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="field-13" class="control-label">Club Website URL</label>
                                                        <input type="text" class="form-control" id="field-13">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="field-14" class="control-label">Club GPG URL</label>
                                                        <input type="text" class="form-control" id="field-14">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="field-15" class="control-label">Club Facebook URL</label>
                                                        <input type="text" class="form-control" id="field-15">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="field-16" class="control-label">Club Twitter URL</label>
                                                        <input type="text" class="form-control" id="field-16">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="field-17" class="control-label">Club Contact Number</label>
                                                        <input type="text" class="form-control" id="field-17">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="field-18" class="control-label">Number of Holes</label>
                                                        <input type="text" class="form-control" id="field-18">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="field-19" class="control-label">Total Yardage</label>
                                                        <input type="text" class="form-control" id="field-19">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="field-20" class="control-label">Course Par</label>
                                                        <input type="text" class="form-control" id="field-20">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group no-margin">
                                                        <label for="field-21" class="control-label">Club Description</label>
                                                        <textarea class="form-control" id="field-21" placeholder="Enter a description of the Club. Upto 250 words."></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="field-22" class="control-label">Green Fee From (£)</label>
                                                        <input type="text" class="form-control" id="field-22">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="field-23" class="control-label">Green Fee To (£)</label>
                                                        <input type="text" class="form-control" id="field-23">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group no-margin">
                                                        <label for="field-24" class="control-label">Club Image</label>
                                                        <input type="file" class="form-control" id="field-24">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group no-margin">
                                                        <label for="field-24" class="control-label">Club Facilities</label>
                                                        <select class="selectpicker" multiple data-style="btn-secondary">
                                                            <option value="Driving">Driving Range</option>
                                                            <option value="Ground">Practice Ground</option>
                                                            <option value="Net">Practice Net</option>
                                                            <option value="Green">Putting Green</option>
                                                            <option value="Green">Swing Studio</option>
                                                            <option value="Buggy">Buggy Hire</option>
                                                            <option value="Trolley">Trolley Hire</option>
                                                            <option value="Society">Allows Society Days</option>
                                                            <option value="Venue">Venue Hire</option>
                                                            <option value="Showers">Showers</option>
                                                            <option value="Snooker">Snooker</option>
                                                            <option value="Gym">Gym</option>
                                                            <option value="Swimming">Swimming Pool</option>
                                                            <option value="Accommodation">Accommdation</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-danger waves-effect waves-light">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Add Golf Club Modal End -->
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
                                            <?php foreach($data as $row){ ?>
                                            <tr>
                                                <td><a href="golfclub.php" class="text-danger"><?php echo $row->CardNumber ?></a></td>
                                                <td><?php echo $row->CardNumber ?></td>
                                                <td><?php echo $row->CardNumber ?></td>
                                                <td><?php echo $row->CardNumber ?></td>
                                                <td><?php echo $row->CardNumber ?></td>
                                                <td>
                                                    <div class="button-list pull-right">
                                                        <button type="button" class="btn btn-icon waves-effect btn-danger"> <i class="fa fa-search"></i> </button>
                                                        <button type="button" class="btn btn-icon waves-effect waves-light btn-warning"> <i class="fa fa-pencil"></i> </button>
                                                        <button type="button" class="btn btn-icon waves-effect waves-light btn-inverse"> <i class="fa fa-remove"></i> </button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- Golf Course Table Row End -->
                    </div>
                </div>
            </div>
            <!-- container end -->

        </div>
        <!-- content end -->



    </div>
</div>