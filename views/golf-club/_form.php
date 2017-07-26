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
            <?= $form->field($model, 'golfclub_name')->textInput(['class' => "form-control", "id" => "golfclub_name"]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?php
            $readonly = false;
            if (!$model->isNewRecord) {
                $readonly = true;
            }
            ?>
            <?= $form->field($model, 'user_username')->textInput(['class' => "form-control", "id" => "user_username", 'readonly' => $readonly]) ?>
        </div>
        <div class="col-md-6">                    
            <?= $form->field($model, 'user_email')->textInput(['class' => "form-control", "id" => "user_email"]) ?>                    
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?php
            if (!$model->isNewRecord) {
                $model->user_password = '';
            }
            ?>
            <?= $form->field($model, 'user_password')->passwordInput(['class' => "form-control", "id" => "user_password"]) ?>        
        </div>
        <div class="col-md-6">        
            <?= $form->field($model, 'user_password_repeat')->passwordInput(['class' => "form-control", "id" => "user_password_repeat"]) ?>        
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'golfclub_address1')->textInput(['class' => "form-control", "id" => "golfclub_address1"]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'golfclub_address2')->textInput(['class' => "form-control", "id" => "golfclub_address2"]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">        
            <?php
            $countries = Country::find()->orderBy('long_name')->all();
            $countryList = ArrayHelper::map($countries, 'id', 'long_name');
            echo $form->field($model, 'golfclub_countryID')->dropDownList($countryList, [
                'prompt' => 'Select Country',
                'data-url' => Url::to(['county/county-list'])
            ]);
            ?>            
        </div>
        <div class="col-md-4">        
            <?php
            $countyList = [];
            if (!$model->isNewRecord && !empty($model->golfclub_countryID)) {
                $counties = County::find()->where('country_id = :country_id', [':country_id' => $model->golfclub_countryID])->orderBy('name')->all();
                $countyList = ArrayHelper::map($counties, 'id', 'name');
            }

            echo $form->field($model, 'golfclub_countyID')->dropDownList($countyList, ['prompt' => 'Select County']);
            ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'golfclub_town')->textInput(['class' => "form-control", "id" => "golfclub_town"]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'golfclub_postCode')->textInput(['class' => "form-control", "id" => "golfclub_postCode"]) ?>
        </div>
        <div class="col-md-8">
            <div class="form-group no-margin">
                <label for="field-12" class="control-label">Address Note</label>
                <?= $form->field($model, 'golfclub_addressNotes')->textarea(['rows' => '3', 'class' => "form-control", "id" => "golfclub_addressNotes", 'placeholder' => 'Include directions if need be.'])->label(false); ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'golfclub_websiteUrl')->textInput(['class' => "form-control", "id" => "golfclub_websiteUrl"]) ?>        
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'golfclub_gpgUrl')->textInput(['class' => "form-control", "id" => "golfclub_gpgUrl"]) ?>        
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'golfclub_facebookUrl')->textInput(['class' => "form-control", "id" => "golfclub_facebookUrl"]) ?>        
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'golfclub_twitterUrl')->textInput(['class' => "form-control", "id" => "golfclub_twitterUrl"]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'golfclub_phone')->textInput(['class' => "form-control", "id" => "golfclub_phone"]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'golfclub_holes')->textInput(['class' => "form-control", "id" => "golfclub_holes"]) ?>       
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">        
            <?= $form->field($model, 'golfclub_yardage')->textInput(['class' => "form-control", "id" => "golfclub_yardage"]) ?>            
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'golfclub_par')->textInput(['class' => "form-control", "id" => "golfclub_par"]) ?>       
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group no-margin">
                <label for="field-21" class="control-label">Club Description</label>
                <?= $form->field($model, 'golfclub_description')->textarea(['rows' => '3', 'class' => "form-control", "id" => "golfclub_description", 'placeholder' => 'Enter a description of the Club upto 250 words.'])->label(false); ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'golfclub_greenFeeFrom')->textInput(['class' => "form-control", "id" => "golfclub_greenFeeFrom"]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'golfclub_greenFeeTo')->textInput(['class' => "form-control", "id" => "golfclub_greenFeeTo"]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group no-margin">
                <label for="field-24" class="control-label">Club Image</label>
                <?php
                if (!$model->isNewRecord && !empty($model->golfclub_logo)) {
                    echo '<div class="form-group showClubLogo" style="height:80px;"><img src="' . Yii::$app->request->baseUrl . '/uploads/' . $model->golfclub_logo . '" style="max-height: 100%;" /></div>';
                } else {
                    echo '<div class="form-group showClubLogo" style="height:80px;"><img src="' . Yii::$app->request->baseUrl . '/images/default-logo.png" style="max-height: 100%;" /></div>';
                }
                ?>
                <?= $form->field($model, 'golfclub_logo')->fileInput(['class' => "form-control", "id" => "golfclub_logo", "style" => "height:auto;"])->label(false) ?>
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
                if (!empty($model->golfclub_facilities)) {
                    $model->golfclub_facilities = explode(',', $model->golfclub_facilities);
                }
                echo $form->field($model, 'golfclub_facilities')->checkboxList($clubFacilitiesList)->label(false);
//            echo $form->field($model, 'clubFacilities')->dropDownList($clubFacilitiesList, [
//                'prompt' => 'Select Country'
//            ])->label(false);
//echo $form->field($model, 'clubFacilities')->dropDownList($clubFacilities, ['prompt' => 'Select Club Facilities', 'multiple' => 'true', 'class' => 'selectpicker', 'data-style' => 'btn-secondary'])->label(false);
                ?>            
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <?php
            if ($model->isNewRecord) {
                $model->golfclub_selfRegistration = 1;
            }

            echo $form->field($model, 'golfclub_selfRegistration', [
                'options' => ['class' => 'checkbox checkbox-success'],
                'template' => "{input}\n{label}\n{hint}\n{error}"
            ])->checkbox(['value' => 1, 'checked' => 'checked'], false)->label('Enable Self Golfer Registration');
            ?>
        </div>
    </div>

</div>

<div class="modal-footer">
    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
    <?= Html::submitButton($model->isNewRecord ? 'Add Club' : 'Save Changes', ['class' => 'btn btn-danger waves-effect waves-light', 'id' => 'btnSave']); ?>
</div>

<?php ActiveForm::end(); ?>

<?php $this->registerJsFile(Yii::$app->request->baseUrl . '/js/golf-club-script.js', ['depends' => [\yii\web\JqueryAsset::className()]]); ?>