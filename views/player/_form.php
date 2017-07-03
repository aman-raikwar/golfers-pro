<?php

use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\GolfCourse;
use app\models\CardMembershipCategory;
use app\models\Country;
use app\models\County;

/* @var $this yii\web\View */
/* @var $model app\models\Player */
/* @var $form yii\widgets\ActiveForm */
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
        <div class="form-group">
            <label for="field-2" class="control-label">Which Golf Club are they a member of?</label>
            <?php
            $GolfCourse = GolfCourse::find()->all();
            $GolfCourseList = ArrayHelper::map($GolfCourse, 'ID', 'Name');
            echo $form->field($model, 'FirstClubID')->dropDownList($GolfCourseList, ['prompt' => 'Select Golf Club'])->label(false);
            ?>            
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="field-3" class="control-label">Member of a second Golf Club?</label>
            <?= $form->field($model, 'IsMemberOfAnotherClub')->dropDownList([1 => 'No', 2 => 'Yes'], ['prompt' => 'Select Second Golf Club?'])->label(false); ?>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="field-4" class="control-label">Select Golf Club</label>
            <?= $form->field($model, 'OtherClubName')->dropDownList($GolfCourseList, ['prompt' => 'Select Golf Club'])->label(false); ?>            
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label for="field-5" class="control-label">Golfer Card Membership Category</label>            
            <?php
            $CardMembershipCategory = CardMembershipCategory::find()->all();
            $CardMembershipCategoryList = ArrayHelper::map($CardMembershipCategory, 'id', 'name');
            echo $form->field($model, 'OpgRegType')->dropDownList($CardMembershipCategoryList, ['prompt' => 'Select Golfer Card Membership Category'])->label(false);
            ?>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="field-6" class="control-label">Title</label>
            <?= $form->field($model, 'Title')->textInput(['class' => "form-control", "id" => "Title"])->label(false) ?>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="field-7" class="control-label">First Name</label>
            <?= $form->field($model, 'FirstName')->textInput(['class' => "form-control", "id" => "FirstName"])->label(false) ?>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="field-8" class="control-label">Last Name</label>
            <?= $form->field($model, 'LastName')->textInput(['class' => "form-control", "id" => "LastName"])->label(false) ?>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="field-9" class="control-label">Gender</label>
            <?= $form->field($model, 'Gender')->dropDownList(['F' => 'Female', 'M' => 'Male'], ['prompt' => 'Select Gender'])->label(false); ?>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="field-10" class="control-label">Date of Birth</label>
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
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="field-11" class="control-label">Email</label>
            <?= $form->field($model, 'Email')->textInput(['class' => "form-control", "id" => "Email"])->label(false) ?>            
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="field-12" class="control-label">Contact Number</label>
            <?= $form->field($model, 'PhoneNo')->textInput(['class' => "form-control", "id" => "PhoneNo"])->label(false) ?>            
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label for="field-13" class="control-label">Address Line 1</label>
            <?= $form->field($model, 'Address')->textInput(['class' => "form-control", "id" => "Address"])->label(false) ?>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label for="field-14" class="control-label">Address Line 2</label>
            <?= $form->field($model, 'Address2')->textInput(['class' => "form-control", "id" => "Address2"])->label(false) ?>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
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
    <div class="col-md-6">
        <div class="form-group">
            <label for="field-9" class="control-label">County</label>
            <?php
            $counties = County::find()->all();
            $countyList = ArrayHelper::map($counties, 'id', 'name');
            echo $form->field($model, 'County')->dropDownList($countyList, ['prompt' => 'Select County'])->label(false);
            ?>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="field-10" class="control-label">Town</label>
            <?= $form->field($model, 'Town')->textInput(['class' => "form-control", "id" => "Town"])->label(false) ?>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="field-18" class="control-label">Postcode</label>
            <?= $form->field($model, 'PostCode')->textInput(['class' => "form-control", "id" => "PostCode"])->label(false) ?>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="checkbox checkbox-success">
            <input id="confirm-marketing" type="checkbox" checked="">
            <label for="confirm-marketing">
                They would like to receive <a href="#" class="text-danger">Relevant Information</a>.
            </label>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="checkbox checkbox-success">
            <input id="confirm" type="checkbox" checked="">
            <label for="confirm">
                They have read and agree to the <a href="#" class="text-danger">Terms and Conditions</a>.
            </label>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group no-margin">
            <label for="field-19" class="control-label">Note</label>
            <?= $form->field($model, 'Notes')->textarea(['rows' => '3', 'class' => "form-control", "id" => "Notes", 'placeholder' => 'Include any additional notes for this Golfer.'])->label(false); ?>
        </div>
    </div>
</div>
<?php $form = ActiveForm::end(); ?>