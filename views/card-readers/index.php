
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
                                            Card Readers
                                        </h3>
                                        <div class="portlet-widgets">
                                            <a href="#" data-toggle="modal" data-target="#addReader"><i class="mdi mdi-plus"> Add New Reader</i></a>
                                        </div>
                                        <div class="clearfix"></div>
                                     </div>
                                        <!-- Add Reader Modal -->
                                            <div id="addReader" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fi-cross"></i></button>
                                                            <h4 class="modal-title" id="myModalLabel">Add a Reader</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                        	<p>Enter the reader unique reference number and then select a club from the drop-down.</p>
                                        					<form class="form-horizontal" action="#">
                                                            <div class="row">
                                                    			<div class="col-md-12">
                                                                	<div class="form-group">
                                                                        <label for="field-1" class="control-label">Reader Reference Number:</label>
                                                                        <input type="text" class="form-control" id="field-1">
                                                                    </div>
                                                                </div>
                                                             </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="field-2" class="control-label">Select Golf Club:</label>
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
                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                                                            <button type="button" class="btn btn-danger waves-effect waves-light">Add Reader</button>
                                                        </div>
                                                     </div>       
                                                </div>
                                            </div>
                                        <!-- Add Reader Modal End -->
                                        <!-- Edit Reader Modal -->
                                            <div id="editReader" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                            <h4 class="modal-title" id="myModalLabel">Edit Reader</h4>
                                                        </div>
                                                        <div class="modal-body">
                                        					<form class="form-horizontal" action="#">
                                                            <div class="row">
                                                    			<div class="col-md-12">
                                                                	<div class="form-group">
                                                                        <label for="field-1" class="control-label">Reader Reference Number:</label>
                                                                        <input type="text" class="form-control" id="field-1" value="GCR98610601">
                                                                    </div>
                                                                </div>
                                                             </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="field-2" class="control-label">Golf Club:</label>
                                                                        <select class="form-control" id="field-2">
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
                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary waves-effect text-danger">Delete Reader</button>
                                                            <button type="button" class="btn btn-danger waves-effect waves-light">Update Reader</button>
                                                        </div>
                                                     </div>       
                                                </div>
                                            </div>
                                        <!-- Edit Reader Modal End -->
                                    <div id="bg-default" class="panel-collapse collapse in show">
                                        <div class="portlet-body">
                                            <div class="table-responsive">
                                                <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                                    <thead>
                                                    <tr>
                                                        <th>Card Reader Number</th>
                                                        <th>Golf Club</th>
                                                        <th>Golf Club Number</th>
                                                        <th></th>
                                                    </tr>
                                                    </thead>
            
            
                                                    <tbody>
                                                    <tr>
                                                        <td>GCR98610601</td>
                                                        <td><a href="golfclub.php" class="text-danger">Radyr Golf Club</a></td>
                                                        <td>610601</td>
                                                        <td>
                                                        	<div class="button-list pull-right">
                                                                <button type="button" class="btn btn-icon waves-effect waves-light btn-warning" href="#" data-toggle="modal" data-target="#editReader"> <i class="fa fa-pencil"></i> </button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>GCR98610602</td>
                                                        <td><a href="golfclub.php" class="text-danger">Clays Golf Club</a></td>
                                                        <td>610602</td>
                                                        <td>
                                                        	<div class="button-list pull-right">
                                                                <button type="button" class="btn btn-icon waves-effect waves-light btn-warning" href="#" data-toggle="modal" data-target="#editReader"> <i class="fa fa-pencil"></i> </button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>GCR98610603</td>
                                                        <td><a href="golfclub.php" class="text-danger">Aberdare Golf Club</a></td>
                                                        <td>610603</td>
                                                        <td>
                                                        	<div class="button-list pull-right">
                                                                <button type="button" class="btn btn-icon waves-effect waves-light btn-warning" href="#" data-toggle="modal" data-target="#editReader"> <i class="fa fa-pencil"></i> </button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>GCR98610604</td>
                                                        <td><a href="golfclub.php" class="text-danger">Aberdovey Golf Club</a></td>
                                                        <td>610604</td>
                                                        <td>
                                                        	<div class="button-list pull-right">
                                                                <button type="button" class="btn btn-icon waves-effect waves-light btn-warning" href="#" data-toggle="modal" data-target="#editReader"> <i class="fa fa-pencil"></i> </button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>GCR98610605</td>
                                                        <td><a href="golfclub.php" class="text-danger">Abergele Golf Club</a></td>
                                                        <td>610605</td>
                                                        <td>
                                                        	<div class="button-list pull-right">
                                                                <button type="button" class="btn btn-icon waves-effect waves-light btn-warning" href="#" data-toggle="modal" data-target="#editReader"> <i class="fa fa-pencil"></i> </button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>GCR98610606</td>
                                                        <td><a href="golfclub.php" class="text-danger">Abersoch Golf Club</a></td>
                                                        <td>610606</td>
                                                        <td>
                                                        	<div class="button-list pull-right">
                                                                <button type="button" class="btn btn-icon waves-effect waves-light btn-warning" href="#" data-toggle="modal" data-target="#editReader"> <i class="fa fa-pencil"></i> </button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>GCR98610607</td>
                                                        <td><a href="golfclub.php" class="text-danger">Aberystwyth Golf Club</a></td>
                                                        <td>610607</td>
                                                        <td>
                                                        	<div class="button-list pull-right">
                                                                <button type="button" class="btn btn-icon waves-effect waves-light btn-warning" href="#" data-toggle="modal" data-target="#editReader"> <i class="fa fa-pencil"></i> </button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>GCR98610608</td>
                                                        <td><a href="golfclub.php" class="text-danger">Alice Springs Golf Club</a></td>
                                                        <td>610608</td>
                                                        <td>
                                                        	<div class="button-list pull-right">
                                                                <button type="button" class="btn btn-icon waves-effect waves-light btn-warning" href="#" data-toggle="modal" data-target="#editReader"> <i class="fa fa-pencil"></i> </button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>GCR98610609</td>
                                                        <td><a href="golfclub.php" class="text-danger">Anglesey Golf Club</a></td>
                                                        <td>610609</td>
                                                        <td>
                                                        	<div class="button-list pull-right">
                                                                <button type="button" class="btn btn-icon waves-effect waves-light btn-warning" href="#" data-toggle="modal" data-target="#editReader"> <i class="fa fa-pencil"></i> </button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>GCR98610610</td>
                                                        <td><a href="golfclub.php" class="text-danger">Ashburnham Golf Club</a></td>
                                                        <td>610610</td>
                                                        <td>
                                                        	<div class="button-list pull-right">
                                                                <button type="button" class="btn btn-icon waves-effect waves-light btn-warning" href="#" data-toggle="modal" data-target="#editReader"> <i class="fa fa-pencil"></i> </button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>GCR98610611</td>
                                                        <td><a href="golfclub.php" class="text-danger">Bala Golf Club</a></td>
                                                        <td>610611</td>
                                                        <td>
                                                        	<div class="button-list pull-right">
                                                                <button type="button" class="btn btn-icon waves-effect waves-light btn-warning" href="#" data-toggle="modal" data-target="#editReader"> <i class="fa fa-pencil"></i> </button>
                                                            </div>
                                                        </td>
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