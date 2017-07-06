<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ResetPasswordForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\components\Alert;

$this->title = 'Reset your Password';
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
                                <p>Please choose your new password:</p>
                                <hr/>
                                <?= Alert::widget() ?>
                                <?php $form = ActiveForm::begin(['id' => 'reset-password-form']); ?>
                                <div class="form-group m-b-20 row">
                                    <div class="col-12">                                        
                                        <?= $form->field($model, 'password')->passwordInput(['class' => 'form-control', 'placeholder' => 'Enter your New Password', 'autofocus' => true]) ?>
                                    </div>
                                </div>

                                <div class="form-group row text-center m-t-10">
                                    <div class="col-12">
                                        <?= Html::submitButton('Reset Password', ['class' => 'btn btn-md btn-block btn-danger waves-effect waves-light']) ?>
                                    </div>
                                </div>
                                <?php ActiveForm::end(); ?>                              

                            </div>
                        </div>
                    </div>                    
                </div>                
            </div>
        </div>
    </div>
</section>