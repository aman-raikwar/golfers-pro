<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Country;
use app\models\County;
use app\models\ClubFunctionality;
?>

<?php $form = ActiveForm::begin(['enableClientValidation' => true, 'enableAjaxValidation' => true, 'options' => ['enctype' => 'multipart/form-data', 'id' => 'golf-club-form']]); ?>

<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h4 class="modal-title" id="myModalLabel"><?php echo ($model->isNewRecord) ? 'Add a Golf Club' : 'Edit Golf Club'; ?></h4>    
</div>

<div class="modal-body">
    <div class="row">
        <div class="col-md-12">        
            <?= $form->field($model, 'Name')->textInput(['class' => "form-control", "id" => "Name"]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'LoginID')->textInput(['class' => "form-control", "id" => "LoginID"]) ?>
        </div>
        <div class="col-md-6">                    
            <?= $form->field($model, 'Email')->textInput(['class' => "form-control", "id" => "Email"]) ?>                    
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?php
            if (!$model->isNewRecord) {
                $model->Password = '';
            }
            ?>
            <?= $form->field($model, 'Password')->passwordInput(['class' => "form-control", "id" => "Password"]) ?>        
        </div>
        <div class="col-md-6">        
            <?= $form->field($model, 'Password_repeat')->passwordInput(['class' => "form-control", "id" => "Password_repeat"]) ?>        
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'Address1')->textInput(['class' => "form-control", "id" => "Address1"]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'Address2')->textInput(['class' => "form-control", "id" => "Address2"]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">        
            <?php
            $countries = Country::find()->orderBy('long_name')->all();
            $countryList = ArrayHelper::map($countries, 'id', 'long_name');
            echo $form->field($model, 'Country')->dropDownList($countryList, [
                'prompt' => 'Select Country',
                'data-url' => Url::to(['golf-clubs/county-list'])
            ]);
            ?>            
        </div>
        <div class="col-md-4">        
            <?php
            $counties = County::find()->orderBy('name')->all();
            $countyList = ArrayHelper::map($counties, 'id', 'name');
            echo $form->field($model, 'County')->dropDownList($countyList, ['prompt' => 'Select County']);
            ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'Town')->textInput(['class' => "form-control", "id" => "Town"]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'PostCode')->textInput(['class' => "form-control", "id" => "PostCode"]) ?>
        </div>
        <div class="col-md-8">
            <div class="form-group no-margin">
                <label for="field-12" class="control-label">Address Note</label>
                <?= $form->field($model, 'AddressNote')->textarea(['rows' => '3', 'class' => "form-control", "id" => "AddressNote", 'placeholder' => 'Include directions if need be.'])->label(false); ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'ClubUrl')->textInput(['class' => "form-control", "id" => "ClubUrl"]) ?>        
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'GpgUrl')->textInput(['class' => "form-control", "id" => "GpgUrl"]) ?>        
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'ClubFacebook')->textInput(['class' => "form-control", "id" => "ClubFacebook"]) ?>        
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'ClubTwitter')->textInput(['class' => "form-control", "id" => "ClubTwitter"]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'ContactNumber')->textInput(['class' => "form-control", "id" => "ContactNumber"]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'ClubHoles')->textInput(['class' => "form-control", "id" => "ClubHoles"]) ?>       
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">        
            <?= $form->field($model, 'ClubYardage')->textInput(['class' => "form-control", "id" => "ClubYardage"]) ?>            
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'ClubPar')->textInput(['class' => "form-control", "id" => "ClubPar"]) ?>       
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group no-margin">
                <label for="field-21" class="control-label">Club Description</label>
                <?= $form->field($model, 'ClubDescription')->textarea(['rows' => '3', 'class' => "form-control", "id" => "ClubDescription", 'placeholder' => 'Enter a description of the Club. Upto 250 words.'])->label(false); ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="field-22" class="control-label">Green Fee From (£)</label>
                <?= $form->field($model, 'GreenFeeFrom')->textInput(['class' => "form-control", "id" => "GreenFeeFrom"])->label(false) ?>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="field-23" class="control-label">Green Fee To (£)</label>
                <?= $form->field($model, 'GreenFeeTo')->textInput(['class' => "form-control", "id" => "GreenFeeTo"])->label(false) ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group no-margin">
                <label for="field-24" class="control-label">Club Image</label>
                <?php
                if (!$model->isNewRecord && !empty($model->ClubLogo)) {
                    echo '<div class="form-group showClubLogo" style="height:80px;"><img src="uploads/' . $model->ClubLogo . '" style="max-height: 100%;" /></div>';
                } else {
                    echo '<div class="form-group showClubLogo" style="height:80px;"><img src="images/default-logo.png" style="max-height: 100%;" /></div>';
                }
                ?>
                <?= $form->field($model, 'ClubLogo')->fileInput(['class' => "form-control", "id" => "ClubLogo"])->label(false) ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group no-margin">
                <label for="field-24" class="control-label">Club Facilities</label>
                <?php
                $clubFacilities = ClubFunctionality::find()->all();
                $clubFacilitiesList = ArrayHelper::map($clubFacilities, 'id', 'name');
                if (!empty($model->ClubFacilities)) {
                    $model->ClubFacilities = explode(',', $model->ClubFacilities);
                }
                echo $form->field($model, 'ClubFacilities')->checkboxList($clubFacilitiesList)->label(false);
//            echo $form->field($model, 'clubFacilities')->dropDownList($clubFacilitiesList, [
//                'prompt' => 'Select Country'
//            ])->label(false);
                //echo $form->field($model, 'clubFacilities')->dropDownList($clubFacilities, ['prompt' => 'Select Club Facilities', 'multiple' => 'true', 'class' => 'selectpicker', 'data-style' => 'btn-secondary'])->label(false);
                ?>            
            </div>
        </div>
    </div>
</div>

<div class="modal-footer">
    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
    <?= Html::submitButton('Save Changes', ['class' => 'btn btn-danger waves-effect waves-light', 'id' => 'btnSave']); ?>
</div>

<?php $form = ActiveForm::end(); ?>