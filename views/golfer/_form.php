<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\GolfClub;
use app\models\CardMembershipCategory;
use app\models\Country;
use app\models\County;
use app\components\Utility;

/* @var $this yii\web\View */
/* @var $model app\models\Golfer */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin(['enableClientValidation' => true, 'enableAjaxValidation' => true, 'options' => ['enctype' => 'multipart/form-data', 'id' => 'golfer-form']]); ?>

<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h4 class="modal-title" id="myModalLabel"><?php echo ($model->isNewRecord) ? 'Add a Golfer' : 'Edit Golfer'; ?></h4>    
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
            <?php
            $GolfClubs = GolfClub::find()->orderby('golfclub_name')->all();
            $GolfClubsList = ArrayHelper::map($GolfClubs, 'golfclub_id', 'golfclub_name');
            echo $form->field($model, 'golfer_firstClubID')->dropDownList($GolfClubsList, ['prompt' => 'Select Golf Club'])->label('Which Golf Club are they a member of?');
            ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <?php
            $disabled = true;
            if (!$model->isNewRecord && $model->golfer_isMemberOfAnotherClub == 2) {
                $disabled = false;
            }
            ?>
            <?= $form->field($model, 'golfer_isMemberOfAnotherClub')->dropDownList([1 => 'No', 2 => 'Yes'], ['disabled' => $disabled])->label('Member of a second Golf Club?'); ?>
        </div>
        <div class="col-md-6">                                        
            <?php
            $disabled = true;
            if (!$model->isNewRecord && $model->golfer_isMemberOfAnotherClub == 2) {
                $disabled = false;
            }
            ?>
            <?= $form->field($model, 'golfer_otherClubID')->dropDownList($GolfClubsList, ['prompt' => 'Select Golf Club', 'disabled' => $disabled])->label('Select Golf Club'); ?>                                        
        </div>
    </div>

    <!--
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="field-4" class="control-label">Golfer Card Membership Category</label>                                                
    <?php
    $CardMembershipCategory = CardMembershipCategory::find()->all();
    $CardMembershipCategoryList = ArrayHelper::map($CardMembershipCategory, 'id', 'name');
    echo $form->field($model, 'golfer_opgRegType')->dropDownList($CardMembershipCategoryList, ['prompt' => 'Select Golfer Card Membership Category'])->label(false);
    ?>
            </div>
        </div>
    </div>
    -->

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'golfer_title')->dropdownList(Utility::getPersonTitles(), ['prompt' => 'Select Title']); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'golfer_firstname')->textInput(['maxlength' => true, 'autocomplete' => 'off']) ?>
        </div>                                    
        <div class="col-md-6">
            <?= $form->field($model, 'golfer_lastname')->textInput(['maxlength' => true, 'autocomplete' => 'off']) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'golfer_gender')->dropDownList(['F' => 'Female', 'M' => 'Male'], ['prompt' => 'Select Gender']) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'golfer_dateOfBirth', ['template' => '<div>{label}<div class="input-group">{input} <span class="input-group-addon bg-custom b-0 show-datepicker"><i class="mdi mdi-calendar text-white"></i></span></div>{error}{hint}</div>'])->textInput(['placeholder' => 'DD-MM-YYYY', 'autocomplete' => 'off']); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'user_email')->textInput(['maxlength' => true, 'autocomplete' => 'off']) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'user_username')->textInput(['maxlength' => true, 'autocomplete' => 'off']) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'user_password')->passwordInput(['maxlength' => true, 'autocomplete' => 'off']) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'user_password_repeat')->passwordInput(['maxlength' => true, 'autocomplete' => 'off']) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <?= $form->field($model, 'golfer_phone')->textInput(['maxlength' => true, 'autocomplete' => 'off']) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <?= $form->field($model, 'golfer_address1')->textInput(['maxlength' => true, 'autocomplete' => 'off']) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">                                        
            <?= $form->field($model, 'golfer_address2')->textInput(['maxlength' => true, 'autocomplete' => 'off']) ?>                                        
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <?php
            $countries = Country::find()->orderBy('nationality')->all();
            $countryList = ArrayHelper::map($countries, 'id', 'nationality');
            echo $form->field($model, 'golfer_country')->dropDownList($countryList, [
                'prompt' => 'Select Country',
                'data-url' => Url::to(['golf-clubs/county-list'])
            ]);
            ?>
        </div>
        <div class="col-md-6">                                        
            <?php
            $counties = County::find()->orderBy('name')->all();
            $countyList = ArrayHelper::map($counties, 'id', 'name');
            echo $form->field($model, 'golfer_county')->dropDownList($countyList, ['prompt' => 'Select County']);
            ?>                                        
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">                                        
            <?= $form->field($model, 'golfer_town')->textInput(['maxlength' => true, 'autocomplete' => 'off']) ?>                                        
        </div>
        <div class="col-md-6">                                        
            <?= $form->field($model, 'golfer_postCode')->textInput(['maxlength' => true, 'autocomplete' => 'off']) ?>                                        
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <?php
            $model->golfer_optIn = 1;
            echo $form->field($model, 'golfer_optIn', [
                'options' => ['class' => 'checkbox checkbox-success'],
                'template' => "{input}\n{label}\n{hint}\n{error}"
            ])->checkbox(['value' => 1, 'checked' => 'checked'], false)->label('They would like to receive <a href="#" class="text-danger">Relevant Information</a>.');
            ?>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <?php
            echo $form->field($model, 'acceptTermsCondition', [
                'options' => ['class' => 'checkbox checkbox-success'],
                'template' => "{input}\n{label}\n{hint}\n{error}"
            ])->checkbox(['checked' => false], false)->label('They have read and agree to the <a href="#" class="text-danger">Terms and Conditions</a>.');
            ?>
        </div>
    </div>    
</div>

<div class="modal-footer">
    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
    <?= Html::submitButton($model->isNewRecord ? 'Add Golfer' : 'Save Changes', ['class' => 'btn btn-danger waves-effect waves-light', 'id' => 'btnSave']); ?>
</div>

<?php $form = ActiveForm::end(); ?>

<?php $this->registerJsFile(Yii::$app->request->baseUrl . '/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js', ['depends' => [\yii\web\JqueryAsset::className()]]); ?>
<?php $this->registerJsFile(Yii::$app->request->baseUrl . '/js/golfer-script.js', ['depends' => [\yii\web\JqueryAsset::className()]]); ?>