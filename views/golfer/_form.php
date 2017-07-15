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
use app\models\RegistrationCards;

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
            <?php
            $user_id = Yii::$app->user->identity->user_id;

            if (Yii::$app->user->identity->user_roleID == 3) {
                $GolfClubs = GolfClub::find()->where(['golfclub_userID' => $user_id])->orderby('golfclub_name')->all();
            } else {
                $GolfClubs = GolfClub::find()->orderby('golfclub_name')->all();
            }
            $GolfClubsList = ArrayHelper::map($GolfClubs, 'golfclub_id', 'golfclub_name');
            echo $form->field($model, 'golfer_firstClubID')->dropDownList($GolfClubsList, ['prompt' => 'Select Golf Club', 'class' => 'form-control select2', 'data-href' => Url::to('/golfer/get-cards')])->label('Which Golf Club are they a member of?');
            ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <?php
                //$cards = array();
//                if (Yii::$app->user->identity->user_roleID == 3) {
//                    $club = GolfClub::findOne(['golfclub_userID' => $user_id]);
//                    if (!empty($club)) {
//                        $cards = RegistrationCards::find()->where(['ClubID' => $club->golfclub_id, 'UserID' => 0])->orWhere(['UserID' => $model->golfer_userID])->orderby('CardNumber')->all();
//                    }
//                } else {
//                    if (!$model->isNewRecord) {
//                        $cards = RegistrationCards::find()->where(['UserID' => 0])->orWhere(['UserID' => $model->golfer_userID])->orderby('CardNumber')->all();
//                    } else {
//                        $cards = RegistrationCards::find()->where(['UserID' => 0])->orderby('CardNumber')->all();
//                    }
//                }
//
//                if (!$model->isNewRecord) {
//                    $card = RegistrationCards::findOne(['UserID' => $model->golfer_userID]);
//                    if (!empty($card)) {
//                        $model->golfer_card_number = $card->ID;
//                    }
//                }
                //$cardsList = ArrayHelper::map($cards, 'ID', 'CardNumber');
                $cards = [];
                if (!$model->isNewRecord) {
                    echo $model->golfer_firstClubID;
                    echo $model->golfer_userID;
                    //$cards = RegistrationCards::find()->where(['ClubID' => $model->golfer_firstClubID, 'UserID' => 0])->orWhere(['UserID' => $model->golfer_userID])->orderby('CardNumber')->all();
                }
                echo $form->field($model, 'golfer_card_number')->dropDownList($cards, ['prompt' => 'Select Card Number', 'class' => 'form-control select2'])->label('Golfer Card Number');
                ?>
            </div>
        </div>
    </div>    

    <div class="row">
        <div class="col-md-6">
            <?php
            $disabled = true;
            if (!$model->isNewRecord || $model->golfer_isMemberOfAnotherClub == 2) {
                $disabled = false;
            }
            ?>
            <?= $form->field($model, 'golfer_isMemberOfAnotherClub')->dropDownList([1 => 'No', 2 => 'Yes'], ['disabled' => $disabled])->label('Member of a second Golf Club?'); ?>
        </div>
        <div class="col-md-6">                                        
            <?php
            $disabled = true;
            if (!$model->isNewRecord || $model->golfer_isMemberOfAnotherClub == 2) {
                $disabled = false;
            }
            ?>
            <?= $form->field($model, 'golfer_otherClubID')->dropDownList($GolfClubsList, ['prompt' => 'Select Golf Club', 'class' => 'form-control select2', 'disabled' => $disabled])->label('Select Golf Club'); ?>                                        
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
            <?= $form->field($model, 'golfer_title')->dropdownList(Utility::getPersonTitles(), ['prompt' => 'Select Title', 'class' => 'form-control select2']); ?>
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
            <?php $model->golfer_dateOfBirth = date('d-m-Y', strtotime($model->golfer_dateOfBirth)); ?>
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
            echo $form->field($model, 'golfer_country')->dropDownList($countryList, ['prompt' => 'Select Country', 'class' => 'form-control', 'data-url' => Url::to(['golf-clubs/county-list'])]);
            ?>
        </div>
        <div class="col-md-6">                                        
            <?php
            $counties = County::find()->orderBy('name')->all();
            $countyList = ArrayHelper::map($counties, 'id', 'name');
            echo $form->field($model, 'golfer_county')->dropDownList($countyList, ['prompt' => 'Select County', 'class' => 'form-control']);
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