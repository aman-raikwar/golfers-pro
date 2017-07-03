<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\view\GridView;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PlayerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
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
                                Golfers
                            </h3>
                            <div class="portlet-widgets">
                                <a href="javascript:void(0);" data-href="<?= Url::to(['player/create']); ?>" id="createGolfer"><i class="mdi mdi-plus"></i></a>
                            </div>
                            <?php
                            $golferModalfooter = '<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>' . Html::submitButton('Save Changes', ['class' => 'btn btn-danger waves-effect waves-light', 'id' => 'btnSubmitGolfer']);

                            Modal::begin([
                                'header' => '<h4 class="modal-title" id="myModalLabel">Add a Golfer</h4>',
                                'footer' => $golferModalfooter,
                                'id' => 'addGolferModal'
                            ]);
                            echo '<div class="golferModalContent"></div>';
                            Modal::end();

                            Modal::begin([
                                'header' => '<h4 class="modal-title" id="myModalLabel">Edit Golfer</h4>',
                                'footer' => $golferModalfooter,
                                'id' => 'editGolferModal'
                            ]);
                            echo '<div class="golferModalContent"></div>';
                            Modal::end();
                            ?>
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
                                                <th>Primary Membership Golf Club</th>
                                                <th>Gender</th>
                                                <th>Card Number</th>
                                                <th></th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php if (count($data) == 0) { ?>
                                                <tr>
                                                    <td  colspan="7" class="text-center">
                                                        No data Found
                                                    </td>
                                                </tr>
                                                <?php
                                            } else {
                                                foreach ($data as $row) {
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $row->ID ?></td>
                                                        <td><a href="golfer.php" class="text-danger"><?php echo $row->FirstName ?></a></td>
                                                        <td><a href="golfer.php" class="text-danger"><?php echo $row->LastName ?></a></td>
                                                        <td><?php echo $row->FirstClubID ?></td>
                                                        <td><?php echo $row->Gender ?></td>
                                                        <td>GCR210010</td>
                                                        <td>
                                                            <div class="button-list pull-right">
                                                                <button type="button" class="btn btn-icon waves-effect btn-danger"> <i class="fa fa-search"></i> </button>
                                                                <?= Html::button('<i class="fa fa-pencil"></i>', ['value' => Url::to(['player/update', 'id' => $row->ID]), 'id' => 'editGolfer', 'class' => 'btn btn-icon waves-effect waves-light btn-warning']) ?>
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
                        <!-- Player Activity Table Row End -->
                    </div>
                </div>
            </div>
            <!-- container end -->
        </div>
        <!-- content end -->
    </div>
</div>
