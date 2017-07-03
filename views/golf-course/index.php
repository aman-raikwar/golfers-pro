<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\view\GridView;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;
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
                                <a href="javascript:void(0);" data-href="<?= Url::to(['golf-clubs/add-club']); ?>" id="createGolfClub"><i class="mdi mdi-plus"></i></a>
                            </div>
                            <?php
                            $golfModalfooter = '<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>' . Html::submitButton('Save Changes', ['class' => 'btn btn-danger waves-effect waves-light', 'id' => 'btnSubmitGolfClub']);

                            Modal::begin([
                                'header' => '<h4 class="modal-title" id="myModalLabel">Add a Golf Club</h4>',
                                'footer' => $golfModalfooter,
                                'id' => 'addGolfModal'
                            ]);
                            echo '<div class="golfModalContent"></div>';
                            Modal::end();

                            Modal::begin([
                                'header' => '<h4 class="modal-title" id="myModalLabel">Edit Golf Club</h4>',
                                'footer' => $golfModalfooter,
                                'id' => 'editGolfModal'
                            ]);
                            echo '<div class="golfModalContent"></div>';
                            Modal::end();
                            ?>
                            <div class="clearfix"></div>
                        </div>
                        <div id="bg-default" class="panel-collapse collapse in show">
                            <div class="portlet-body">
                                <div class="table-responsive">

                                    <table id="datatable-buttons" class="table table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Club Number</th>
                                                <th>Club Name</th>                                                
                                                <th>Club Email</th>
                                                <th>Associated Golfers</th>
                                                <th>Number of Check-ins</th>
                                                <th></th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php if (count($data) == 0) { ?>
                                                <tr>
                                                    <td  colspan="12" class="text-center">
                                                        No data Found
                                                    </td>
                                                </tr>
                                                <?php
                                            } else {
                                                foreach ($data as $row) {
                                                    ?>
                                                    <tr>
                                                        <td><a href="golfclub.php" class="text-danger"><?php echo $row->ID ?></a></td>
                                                        <td><?php echo $row->Name ?></td>
                                                        <td><?php echo $row->Email ?></td>
                                                        <td><?php echo $row->ID ?></td>
                                                        <td><?php echo $row->ID ?></td>
                                                        <td>
                                                            <div class="button-list pull-right">
                                                                <button type="button" class="btn btn-icon waves-effect btn-danger"> <i class="fa fa-search"></i> </button>
                                                                <!-- <button type="button" class="btn btn-icon waves-effect waves-light btn-warning"> <i class="fa fa-pencil"></i> </button> -->
                                                                <?= Html::button('<i class="fa fa-pencil"></i>', ['value' => Url::to(['golf-clubs/edit-club', 'id' => $row->ID]), 'id' => 'editGolfClub', 'class' => 'btn btn-icon waves-effect waves-light btn-warning']) ?>
                                                                <?=
                                                                Html::a('<i class="fa fa-remove"></i>', ['delete', 'id' => $row->ID], [
                                                                    'class' => 'btn btn-icon waves-effect waves-light btn-inverse',
                                                                    'data' => [
                                                                        'confirm' => 'Are you sure you want to delete this item?',
                                                                        'method' => 'post',
                                                                    ],
                                                                ])
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
                        <!-- Golf Course Table Row End -->
                    </div>
                </div>
            </div>
            <!-- container end -->

        </div>
        <!-- content end -->
    </div>
</div>