<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\view\GridView;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;

$this->title = 'Golf Clubs';
?>
<div class="content-page">

    <!-- content -->
    <div class="content">        
        <div class="container-fluid">            
            <div class="row">
                <div class="col-12">
                    <div class="portlet">
                        <div class="portlet-heading bg-inverse">
                            <h3 class="portlet-title">Golf Clubs</h3>
                            <div class="portlet-widgets">
                                <a href="javascript:void(0);" class="link-golf-club" data-href="<?= Url::to(['golf-clubs/add-club']); ?>"><i class="mdi mdi-plus"></i></a>
                            </div>
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
                                                                <?=
                                                                Html::a('<span class="fa fa-pencil"></span>', 'javascript:void(0);', [
                                                                    'title' => Yii::t('app', 'Edit'),
                                                                    'class' => 'btn btn-icon waves-effect waves-light btn-warning link-golf-club',
                                                                    'data-href' => Url::to(['golf-clubs/edit-club', 'id' => $row->ID])
                                                                ]);
                                                                ?>
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

<?php
Modal::begin(['id' => 'golf-club-modal']);
Modal::end();
?>

<?php $this->registerJsFile(Yii::$app->request->baseUrl . '/js/golfclub-script.js', ['depends' => [\yii\web\JqueryAsset::className()]]); ?>