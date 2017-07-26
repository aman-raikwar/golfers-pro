<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Country;
use app\models\County;
use app\models\GolfClub;
use app\models\CardMembershipCategory;
use app\components\Utility;

$this->title = 'Golfer Registration';
?>

<?php
if (Yii::$app->session->hasFlash('success')) {
    $golferID = Yii::$app->session->getFlash('success');
    if (!empty($golferID)) {
        ?>
        <!-- Registration Success Modal -->
        <div id="registerSuccess" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title" id="myModalLabel">Registration Success</h4>
                    </div>
                    <div class="modal-body">
                        <p>Thank you for registering with The Golfer Card. We have sent you a confirmation email to activate your account.<br/><br/>Follow the link and you will then be able to login.</p>
                    </div>
                    <div class="modal-footer">
                        <a href="<?= Url::to(['login']); ?>" class="btn btn-secondary waves-effect text-danger">Login Page</a>  
                        <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Registration Success Modal End -->
        <?php
    }
}
?>

<section>    
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="wrapper-page">
                    <div class="account-pages">
                        <div class="account-box">
                            <div class="account-logo-box bg-inverse">
                                <h2 class="text-uppercase text-center">
                                    <a href="<?php echo Yii::$app->request->baseUrl; ?>" class="text-success">
                                        <span><img src="<?php echo Yii::$app->request->baseUrl; ?>/images/logo.png"></span>
                                    </a>
                                </h2>
                            </div>
                            <div class="account-content">
                                <h5 class="text-uppercase font-bold">Register for the Golfer Card</h5>
                                <p>Fill out the form below and we will send you an acitivation link to your account. Once the deadline has been reached for your club, you will be notified when you can pick up your personalised Golfer Card from your Clubhouse.</p>
                                <p>If your Golf Club is not in the list, please <a href="#" class="text-danger">click here</a> to find out how to join.</p>
                                <hr/>
                                <?php $form = ActiveForm::begin(['enableClientValidation' => true, 'enableAjaxValidation' => TRUE], ['id' => 'golfer-registration-form', 'class' => 'form-horizontal']); ?>

                                <div class="row">
                                    <div class="col-md-12">                                        
                                        <?php
                                        $GolfClubs = GolfClub::find()->where(['golfclub_selfRegistration' => 1])->orderby('golfclub_name')->all();
                                        $GolfClubsList = ArrayHelper::map($GolfClubs, 'golfclub_id', 'golfclub_name');
                                        echo $form->field($model, 'golfer_firstClubID')->dropDownList($GolfClubsList, ['prompt' => 'Select Golf Club']);
                                        ?>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <?php
                                        $disabled = 'true';
                                        if ($model->golfer_isMemberOfAnotherClub == 2) {
                                            $disabled = 'false';
                                        }
                                        ?>
                                        <?= $form->field($model, 'golfer_isMemberOfAnotherClub')->dropDownList([1 => 'No', 2 => 'Yes'], ['disabled' => $disabled]); ?>
                                    </div>
                                    <div class="col-md-6">                                        
                                        <?php
                                        $disabled = 'true';
                                        if (!empty($model->golfer_otherClubID)) {
                                            $disabled = 'false';
                                        }
                                        ?>
                                        <?= $form->field($model, 'golfer_otherClubID')->dropDownList($GolfClubsList, ['prompt' => 'Select Golf Club', 'disabled' => $disabled]); ?>                                        
                                    </div>
                                </div>

                                <!--
                                <div class="row">
                                    <div class="col-md-12">                                        
                                <?php
                                $CardMembershipCategory = CardMembershipCategory::find()->all();
                                $CardMembershipCategoryList = ArrayHelper::map($CardMembershipCategory, 'id', 'name');
                                echo $form->field($model, 'golfer_opgRegType')->dropDownList($CardMembershipCategoryList, ['prompt' => 'Select Golfer Card Membership Category']);
                                ?>                                        
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
                                            'data-url' => Url::to(['county/county-list'])
                                        ]);
                                        ?>
                                    </div>
                                    <div class="col-md-6">                                        
                                        <?php
                                        $countyList = [];
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
                                        ])->checkbox(['value' => 1, 'checked' => 'checked'], false)->label('I confirm I would like to receive <a href="#" class="text-danger">Relevant Information</a>.');
                                        ?>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <?php
                                        echo $form->field($model, 'acceptTermsCondition', [
                                            'options' => ['class' => 'checkbox checkbox-success'],
                                            'template' => "{input}\n{label}\n{hint}\n{error}"
                                        ])->checkbox(['checked' => false], false)->label('I confirm I have read and agree to the <a href="#" class="text-danger">Terms and Conditions</a>.');
                                        ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <hr/>
                                        <div class="form-group">
                                            <?= Html::submitButton('Register', ['class' => 'btn btn-md btn-block btn-danger waves-effect waves-light btnRegisterGolfer']) ?>
                                        </div>
                                        <p class="text-center"><?= Html::a('Back to Login', ['site/login']) ?></p>
                                    </div>
                                </div>

                                <?php $form = ActiveForm::end(); ?>
                            </div>
                        </div>
                    </div>                    
                </div>            
            </div>
            <!-- end wrapper -->
        </div>
</section>
<!-- END HOME -->

<?php $this->registerJsFile(Yii::$app->request->baseUrl . '/js/golfer-registration-script.js', ['depends' => [\yii\web\JqueryAsset::className()]]); ?>
