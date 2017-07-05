<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\PasswordResetRequestForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use app\components\Alert;

$this->title = 'Request password reset';
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
                                <p>Please fill out your email. A link to reset password will be sent there.</p>
                                <hr/>
                                <?= Alert::widget() ?>
                                <?php $form = ActiveForm::begin(['id' => 'request-password-reset-form']); ?>
                                <div class="form-group m-b-20 row">
                                    <div class="col-12">
                                        <label for="emailaddress">Email address</label>
                                        <?= $form->field($model, 'user_email')->textInput(['class' => 'form-control', 'placeholder' => 'Email', 'autofocus' => true])->label(false) ?>
                                    </div>
                                </div>

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
