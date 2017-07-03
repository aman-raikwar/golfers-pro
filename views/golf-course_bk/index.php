
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
                                            Golfer Cards
                                        </h3>
                                        <div class="portlet-widgets">
                                            <a href="#" data-toggle="modal" data-target="#requestCards"><i class="mdi mdi-alert"> Request New Cards</i></a>
                                        	<!-- Assign for Platform Admin only -->
                                            <a href="#" data-toggle="modal" data-target="#assignCards"><i class="mdi mdi-plus"></i></a>
                                        	<!-- Assign for Platform Admin only End -->
                                        </div>
                                        <div class="clearfix"></div>
                                     </div>
                                        <!-- Request Cards Modal -->
                                            <div id="requestCards" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                            <h4 class="modal-title" id="myModalLabel">Request More Golfer Cards</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                        	<p>Let us know how many Golfer Cards you need and we will send out a fresh batch to you. It typically takes 5 days for us to deliver your Cards from the day of request.</p>
                                                            <!-- Number of Cards -->
                                                            <label for="field-1" class="control-label">Number of Cards:</label>
                                                            <input type="text" class="form-control" id="field-1">
                                                            <!-- Number of Cards End -->
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                                                            <button type="button" class="btn btn-danger waves-effect waves-light">Request Cards</button>
                                                        </div>
                                                     </div>       
                                                </div>
                                            </div>
                                        <!-- Request Cards Modal End -->
                                        <!-- Assign Golfer Cards Modal -->
                                            <div id="assignCards" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fi-cross"></i></button>
                                                            <h4 class="modal-title" id="myModalLabel">Assign Cards</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                        	<p>To assign a new batch of Golfer Cards, please first select the Golf Club you would like to assign them to. Then, enter the range of the Card Numbers you wish to add.</p>
                                                            <form class="form-horizontal" action="#">
                                                            	<div class="row">
                                                                	<div class="col-12">
                                                                    	<div class="form-group">
                                                                        	<!-- Select Golf Club -->
                                                                            <label for="field-1" class="control-label">Select Golf Club:</label>
                                                                            <select class="form-control" id="field-1">
                                                                                <option>Select</option>
                                                                                <option>Aberdare Golf Club</option>
                                                                                <option>Aberdovey Golf Club</option>
                                                                                <option>Abergele Golf Club</option>
                                                                                <option>Abersoch Golf Club</option>
                                                                                <option>Aberystwyth Golf Club</option>
                                                                            </select>
                                                                            <!-- Select Golf Club End -->
                                                                        </div>
                                                                    </div>
                                                                 </div>
                                                            	<div class="row">
                                                                	<div class="col-6">
                                                                    	<div class="form-group">
                                                                            <!-- Bottom Range -->
                                                                            <label for="field-2" class="control-label">Bottom Range:</label>
                                                                            <input type="text" class="form-control" id="field-2">
                                                                            <!-- Bottom Range End -->
                                                                        </div>
                                                                    </div>
                                                                	<div class="col-6">
                                                                    	<div class="form-group">
                                                                            <!-- Top Range -->
                                                                            <label for="field-2" class="control-label">Top Range:</label>
                                                                            <input type="text" class="form-control" id="field-2">
                                                                            <!-- Top Range End -->
                                                                        </div>
                                                                    </div>
                                                                 </div>
                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                                                            <button type="button" class="btn btn-danger waves-effect waves-light">Assign Cards</button>
                                                        </div>
                                                     </div>       
                                                </div>
                                            </div>
                                        <!-- Import Golfer Card Modal End -->
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
                                                    <tr>
                                                    	<td>GCR1001</td>
                                                        <td>Radyr Golf Club</td>
                                                        <td><a href="golfer.php" class="text-danger">Benjamin</a></td>
                                                        <td><a href="golfer.php" class="text-danger">Chan</a></td>
                                                        <td>01/06/2017</td>
                                                    </tr>
                                                    <tr>
                                                    	<td>GCR1002</td>
                                                        <td>Radyr Golf Club</td>
                                                        <td><a href="golfer.php" class="text-danger">Andrew</a></td>
                                                        <td><a href="golfer.php" class="text-danger">Watkins</a></td>
                                                        <td>05/06/2017</td>
                                                    </tr>
                                                    <tr>
                                                    	<td>GCR1003</td>
                                                        <td>Radyr Golf Club</td>
                                                        <td><a href="golfer.php" class="text-danger">Sarah</a></td>
                                                        <td><a href="golfer.php" class="text-danger">Munrow</a></td>
                                                        <td>01/04/2017</td>
                                                    </tr>
                                                    <tr>
                                                    	<td>GCR1004</td>
                                                        <td>Langland Bay Golf Club</td>
                                                        <td><a href="golfer.php" class="text-danger">Paul</a></td>
                                                        <td><a href="golfer.php" class="text-danger">Robinson</a></td>
                                                        <td>10/03/2017</td>
                                                    </tr>
                                                    <tr>
                                                    	<td>GCR1005</td>
                                                        <td>Langland Bay Golf Club</td>
                                                        <td><a href="golfer.php" class="text-danger">Katie</a></td>
                                                        <td><a href="golfer.php" class="text-danger">White</a></td>
                                                        <td>21/03/2017</td>
                                                    </tr>
                                                    <tr>
                                                    	<td>GCR1006</td>
                                                        <td>Radyr Golf Club</td>
                                                        <td><a href="golfer.php" class="text-danger">Lee</a></td>
                                                        <td><a href="golfer.php" class="text-danger">Dawkins</a></td>
                                                        <td>10/04/2017</td>
                                                    </tr>
                                                    <tr>
                                                    	<td>GCR1007</td>
                                                        <td>Radyr Golf Club</td>
                                                        <td><a href="golfer.php" class="text-danger">Jerry</a></td>
                                                        <td><a href="golfer.php" class="text-danger">Peters</a></td>
                                                        <td>11/02/2017</td>
                                                    </tr>
                                                    <tr>
                                                    	<td>GCR1008</td>
                                                        <td>Radyr Golf Club</td>
                                                        <td><a href="golfer.php" class="text-danger">Claire</a></td>
                                                        <td><a href="golfer.php" class="text-danger">Rogers</a></td>
                                                        <td>02/01/2017</td>
                                                    </tr>
                                                    <tr>
                                                    	<td>GCR1009</td>
                                                        <td>Langland Bay Golf Club</td>
                                                        <td><a href="golfer.php" class="text-danger">Terry</a></td>
                                                        <td><a href="golfer.php" class="text-danger">Watkins</a></td>
                                                        <td>24/04/2017</td>
                                                    </tr>
                                                    <tr>
                                                    	<td>GCR1010</td>
                                                        <td>Langland Bay Golf Club</td>
                                                        <td><a href="golfer.php" class="text-danger">Jessica</a></td>
                                                        <td><a href="golfer.php" class="text-danger">Beale</a></td>
                                                        <td>06/06/2017</td>
                                                    </tr>
                                                    <tr>
                                                    	<td>GCR1011</td>
                                                        <td>Radyr Golf Club</td>
                                                        <td><a href="golfer.php" class="text-danger">Neville</a></td>
                                                        <td><a href="golfer.php" class="text-danger">Sanderson</a></td>
                                                        <td>15/02/2017</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                </div>
                            </div>
                        </div>
                        <!-- Player Activity Table Row End -->
                        </div>
                     </div>
                    </div>
                    <!-- container end -->

                </div>
                <!-- content end -->
    </div>
</div>