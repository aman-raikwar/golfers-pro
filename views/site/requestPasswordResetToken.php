<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\PasswordResetRequestForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use app\components\Alert;

$this->title = 'Forgot your Password?';
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
                                    <a href="index.php" class="text-success">
                                        <span><img src="<?php echo Yii::$app->request->baseUrl; ?>/images/logo.png"></span>
                                    </a>
                                </h2>
                            </div>
                            <div class="account-content">
                                <h5 class="text-uppercase font-bold"><?= Html::encode($this->title) ?></h5>
                                <p>Please fill out your Email or Username. A link to reset your password will be emailed to you.</p>
                                <hr/>
                                <?= Alert::widget() ?>
                                <?php $form = ActiveForm::begin(['id' => 'request-password-reset-form']); ?>

                                <div class="form-group m-b-20 row">
                                    <div class="col-6">
                                        <?php
                                        $disabledEmailBox = false;
                                        $disabledUsernameBox = false;
                                        if (empty($model->request_type)) {
                                            $model->request_type = 1;
                                            $disabledUsernameBox = true;
                                        } else {
                                            if ($model->request_type == 1) {
                                                $disabledUsernameBox = true;
                                            } else {
                                                $disabledEmailBox = true;
                                            }
                                        }
                                        ?>
                                        <div class="radio radio-custom">
                                            <input type="radio" class="radio-request-type" name="PasswordResetRequestForm[request_type]" id="passwordresetrequestform-request_type-email" value="1" <?php echo $disabledEmailBox == false ? 'checked="checked"' : '' ?>>
                                            <label for="passwordresetrequestform-request_type-email">Email Address</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="radio radio-custom">
                                            <input type="radio" class="radio-request-type" name="PasswordResetRequestForm[request_type]" id="passwordresetrequestform-request_type-username" value="2" <?php echo $disabledUsernameBox == false ? 'checked="checked"' : '' ?>>
                                            <label for="passwordresetrequestform-request_type-username">Username</label>
                                        </div>                                       
                                    </div>
                                </div>

                                <div class="form-group m-b-20 row show-email-box" <?php echo $disabledEmailBox == true ? 'style="display: none;"' : '' ?>>
                                    <div class="col-12">                                        
                                        <?= $form->field($model, 'user_email')->textInput(['class' => 'form-control', 'placeholder' => 'Email', 'autofocus' => true]) ?>
                                    </div>
                                </div>

                                <div class="form-group m-b-20 row show-username-box" <?php echo $disabledUsernameBox == true ? 'style="display: none;"' : '' ?>>
                                    <div class="col-12">                                        
                                        <?= $form->field($model, 'user_username')->textInput(['class' => 'form-control', 'placeholder' => 'Username']) ?>
                                    </div>
                                </div>

                                <?php if (!empty($users)) { ?>
                                    <div class="form-group m-b-20">
                                        <?php foreach ($users as $user) { ?>
                                            <div class="col-12 select-user">
                                                <div class="radio radio-custom">
                                                    <input type="radio" name="selectedUser" id="selectedUser_<?= $user['user_id'] ?>" value="<?= $user['user_id'] ?>">
                                                    <label for="selectedUser_<?= $user['user_id'] ?>"><?= $user['user_username'] ?></label>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                <?php } ?>

                                <div class="form-group row text-center m-t-10">
                                    <div class="col-12">
                                        <?= Html::submitButton('Send', ['class' => 'btn btn-md btn-block btn-danger waves-effect waves-light']) ?>
                                    </div>
                                </div>
                                <?php ActiveForm::end(); ?>

                                <div class="row m-t-50">
                                    <div class="col-sm-12 text-center">
                                        <p class="text-center"><?= Html::a('Back to Login', ['site/login']) ?></p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end card-box-->
                </div>
                <!-- end wrapper -->
            </div>
        </div>
    </div>
</section>

<style type="text/css">
    .select-user {border: 1px solid #ccc;padding-top: 10px;padding-bottom: 5px;}
    .select-user:last-child {border-top: none;}
    .select-user:hover {border-color: #32c861;border-top: 1px solid #32c861;cursor: pointer;}
    .select-user.activeUser {border-color: #32c861;border-top: 1px solid #32c861;}
</style>

<?php
$script = <<< JS
    $('.radio-request-type').on('click', function() {
        var type = $(this).val();
        if(type == 1) {
            $('.show-username-box').hide();
            $('.show-email-box').show();            
            $('#passwordresetrequestform-user_email').focus();
        } else {
            $('.show-email-box').hide();
            $('.show-username-box').show();
            $('#passwordresetrequestform-user_username').focus();
        }
   })
        
        $('.select-user').on('click', function() {
            $('.select-user').removeClass('activeUser');
            $(this).addClass('activeUser');            
        })
JS;
$this->registerJs($script);
?>