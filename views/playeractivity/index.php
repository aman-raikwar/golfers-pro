
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
                        <!-- Player Activity Table Row -->
                        <div class="row top-row">
                            <div class="col-12">
                            	<div class="portlet">
                                    <div class="portlet-heading bg-inverse">
                                        <h3 class="portlet-title">
                                            Player Activity
                                        </h3>
                                        <div class="portlet-widgets">
                                            <a href="#" data-toggle="modal" data-target="#addActivity"><i class="mdi mdi-plus">Add Activity</i></a>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <!-- Add Activity Modal -->
                                            <div id="addActivity" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fi-cross"></i></button>
                                                            <h4 class="modal-title" id="myModalLabel">Add Activity</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="field-1" class="control-label">Golfer Card Number</label>
                                                                            <select class="select2 form-control select2" multiple="multiple" placeholder="Choose ..." id="field-1">
                                            
                                                <option value="110001">110001</option>
                                                <option value="220001">220001</option>
                                                <option value="110001">330001</option>
                                                <option value="110001">335101</option>
                                                <option value="110001">335201</option>
                                                <option value="110001">336001</option>
                                                <option value="110001">337001</option>
                                                <option value="110001">338001</option>
                                                <option value="220001">440001</option>
                                                <option value="220001">550001</option>
                                                <option value="110001">660001</option>
                                                <option value="220001">770001</option>
                                                <option value="110001">880001</option>
                                                <option value="220001">990001</option>
                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <p><strong>Mr David Atkins</strong> from <strong>Cardiff Bay Golf Club</strong>.</p>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="field-2" class="control-label">Check-in to Golf Club</label>
                                                                        <select class="form-control" id="field-2">
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
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="field-3" class="control-label">Date</label>
                                                                        <!-- Select Date -->
                                                                        <div>
                                                                            <div class="input-group">
                                                                                <input type="text" class="form-control" placeholder="mm/dd/yyyy" id="datepicker">
                                                                                <span class="input-group-addon bg-custom b-0"><i class="mdi mdi-calendar text-white"></i></span>
                                                                            </div>
                                                                        </div>
                                                                        <!-- Select Date End -->
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="field-4" class="control-label">Time</label>
                                                                        <!-- Select Time -->
                                                                        <div>
                                                                            <div class="input-group">
                                                                                <input type="text" class="form-control" placeholder="mm/dd/yyyy" id="datepicker">
                                                                                <span class="input-group-addon bg-custom b-0"><i class="mdi mdi-clock text-white"></i></span>
                                                                            </div>
                                                                        </div>
                                                                        <!-- Select Time End -->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                                                            <button type="button" class="btn btn-danger waves-effect waves-light">Add Activity</button>
                                                        </div>
                                                    </div>
                                                </div>
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
                                                    <tr>
                                                        <td><a href="golfclub.php" class="text-danger">Radyr Golf Club</a></td>
                                                        <td><a href="golfer.php" class="text-danger">Benjamin Chan</a></td>
                                                        <td>Radyr Golf Club</td>
                                                        <td>24/05/2017</td>
                                                        <td>09:00</td>
                                                    </tr>
                                                    <tr>
                                                        <td><a href="golfclub.php" class="text-danger">Radyr Golf Club</a></td>
                                                        <td><a href="golfer.php" class="text-danger">Andrew Watkins</a></td>
                                                        <td>Radyr Golf Club</td>
                                                        <td>23/05/2017</td>
                                                        <td>14:31</td>
                                                    </tr>
                                                    <tr>
                                                        <td><a href="golfclub.php" class="text-danger">Clays Golf Club</a></td>
                                                        <td><a href="golfer.php" class="text-danger">Sarah Munrow</a></td>
                                                        <td>Radyr Golf Club</td>
                                                        <td>23/05/2017</td>
                                                        <td>14:30</td>
                                                    </tr>
                                                    <tr>
                                                        <td><a href="golfclub.php" class="text-danger">Radyr Golf Club</a></td>
                                                        <td><a href="golfer.php" class="text-danger">Paul Robinson</a></td>
                                                        <td>Radyr Golf Club</td>
                                                        <td>23/05/2017</td>
                                                        <td>14:29</td>
                                                    </tr>
                                                    <tr>
                                                        <td><a href="golfclub.php" class="text-danger">Clays Golf Club</a></td>
                                                        <td><a href="golfer.php" class="text-danger">Katie White</a></td>
                                                        <td>Radyr Golf Club</td>
                                                        <td>23/05/2017</td>
                                                        <td>14:28</td>
                                                    </tr>
                                                    <tr>
                                                        <td><a href="golfclub.php" class="text-danger">Radyr Golf Club</a></td>
                                                        <td><a href="golfer.php" class="text-danger">Lee Dawkins</a></td>
                                                        <td>Radyr Golf Club</td>
                                                        <td>23/05/2017</td>
                                                        <td>14:26</td>
                                                    </tr>
                                                    <tr>
                                                        <td><a href="golfclub.php" class="text-danger">Clays Golf Club</a></td>
                                                        <td><a href="golfer.php" class="text-danger">Jerry Peters</a></td>
                                                        <td>Radyr Golf Club</td>
                                                        <td>23/05/2017</td>
                                                        <td>14:23</td>
                                                    </tr>
                                                    <tr>
                                                        <td><a href="golfclub.php" class="text-danger">Radyr Golf Club</a></td>
                                                        <td><a href="golfer.php" class="text-danger">Claire Rogers</a></td>
                                                        <td>Radyr Golf Club</td>
                                                        <td>23/05/2017</td>
                                                        <td>14:21</td>
                                                    </tr>
                                                    <tr>
                                                        <td><a href="golfclub.php" class="text-danger">Clays Golf Club</a></td>
                                                        <td><a href="golfer.php" class="text-danger">Terry Watkins</a></td>
                                                        <td>Radyr Golf Club</td>
                                                        <td>23/05/2017</td>
                                                        <td>14:20</td>
                                                    </tr>
                                                    <tr>
                                                        <td><a href="golfclub.php" class="text-danger">Radyr Golf Club</a></td>
                                                        <td><a href="golfer.php" class="text-danger">Jessica Beale</a></td>
                                                        <td>Radyr Golf Club</td>
                                                        <td>23/05/2017</td>
                                                        <td>14:15</td>
                                                    </tr>
                                                    <tr>
                                                        <td><a href="golfclub.php" class="text-danger">Clays Golf Club</a></td>
                                                        <td><a href="golfer.php" class="text-danger">Neville Sanderson</a></td>
                                                        <td>Radyr Golf Club</td>
                                                        <td>23/05/2017</td>
                                                        <td>14:11</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
											</div>
										</div>
									</div>
								</div>
                        <!-- Player Activity Table Row End -->
                        </div>
                     </div>
                    </div>
                    <!-- container end -->
    </div>
</div>