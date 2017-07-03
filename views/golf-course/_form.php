<?php

use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Country;
use app\models\County;
use app\models\ClubFunctionality;
?>

<?php
$form = ActiveForm::begin([
            'enableClientValidation' => true,
            'enableAjaxValidation' => true,
            'options' => ['enctype' => 'multipart/form-data']
        ]);
?>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label for="field-1" class="control-label"> Golf Club Name</label>
            <?= $form->field($model, 'Name')->textInput(['class' => "form-control", "id" => "Name"])->label(false) ?>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="field-2" class="control-label">Admin Login</label>
            <?= $form->field($model, 'LoginID')->textInput(['class' => "form-control", "id" => "LoginID"])->label(false) ?>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="field-3" class="control-label">Email Address</label>
            <?= $form->field($model, 'Email')->textInput(['class' => "form-control", "id" => "Email"])->label(false) ?>            
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="field-4" class="control-label">Password</label>
            <?php
            if (!$model->isNewRecord) {
                $model->Password = '';
            }
            ?>
            <?= $form->field($model, 'Password')->passwordInput(['class' => "form-control", "id" => "Password"])->label(false) ?>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="field-5" class="control-label">Repeat Password</label>
            <?= $form->field($model, 'Password_repeat')->passwordInput(['class' => "form-control", "id" => "Password_repeat"])->label(false) ?>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="field-6" class="control-label">Address Line 1</label>
            <?= $form->field($model, 'Address1')->textInput(['class' => "form-control", "id" => "Address1"])->label(false) ?>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="field-7" class="control-label">Address Line 2</label>
            <?= $form->field($model, 'Address2')->textInput(['class' => "form-control", "id" => "Address2"])->label(false) ?>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="field-8" class="control-label">Country</label>
            <?php
            $countries = Country::find()->all();
            $countryList = ArrayHelper::map($countries, 'id', 'long_name');
            echo $form->field($model, 'Country')->dropDownList($countryList, [
                'prompt' => 'Select Country',
                'data-url' => Url::to(['golf-clubs/county-list'])
            ])->label(false);
            ?>            
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="field-9" class="control-label">County</label>
            <?php
            $counties = County::find()->all();
            $countyList = ArrayHelper::map($counties, 'id', 'name');
            echo $form->field($model, 'County')->dropDownList($countyList, ['prompt' => 'Select County'])->label(false);
            ?>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="field-10" class="control-label">Town</label>
            <?= $form->field($model, 'Town')->textInput(['class' => "form-control", "id" => "Town"])->label(false) ?>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="field-11" class="control-label">Postcode</label>
            <?= $form->field($model, 'PostCode')->textInput(['class' => "form-control", "id" => "PostCode"])->label(false) ?>
        </div>
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
        <div class="form-group">
            <label for="field-13" class="control-label">Club Website URL</label>            
            <?= $form->field($model, 'ClubUrl')->textInput(['class' => "form-control", "id" => "ClubUrl"])->label(false) ?>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="field-14" class="control-label">Club GPG URL</label>
            <?= $form->field($model, 'GpgUrl')->textInput(['class' => "form-control", "id" => "GpgUrl"])->label(false) ?>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="field-15" class="control-label">Club Facebook URL</label>
            <?= $form->field($model, 'ClubFacebook')->textInput(['class' => "form-control", "id" => "ClubFacebook"])->label(false) ?>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="field-16" class="control-label">Club Twitter URL</label>
            <?= $form->field($model, 'ClubTwitter')->textInput(['class' => "form-control", "id" => "ClubTwitter"])->label(false) ?>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="field-17" class="control-label">Club Contact Number</label>
            <?= $form->field($model, 'ContactNumber')->textInput(['class' => "form-control", "id" => "ContactNumber"])->label(false) ?>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="field-18" class="control-label">Number of Holes</label>
            <?= $form->field($model, 'ClubHoles')->textInput(['class' => "form-control", "id" => "ClubHoles"])->label(false) ?>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="field-19" class="control-label">Total Yardage</label>
            <?= $form->field($model, 'ClubYardage')->textInput(['class' => "form-control", "id" => "ClubYardage"])->label(false) ?>            
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="field-20" class="control-label">Course Par</label>
            <?= $form->field($model, 'ClubPar')->textInput(['class' => "form-control", "id" => "ClubPar"])->label(false) ?>
        </div>
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
<?php echo $model->ClubFacilities; ?>
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
<?php $form = ActiveForm::end(); ?>