<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use app\components\Alert;

$this->title = 'Login';
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
                                <h5 class="text-uppercase font-bold">Login to your account</h5>
                                <hr/>
                                <?= Alert::widget() ?>
                                <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                                <?php
                                $cookies = Yii::$app->request->cookies;
                                if ($cookies->has('username')) {
                                    $model->username = $cookies->getValue('username');
                                }
                                if ($cookies->has('password')) {
                                    $model->password = $cookies->getValue('password');
                                }

                                if ($cookies->has('rememberMe')) {
                                    $model->rememberMe = $cookies->getValue('rememberMe');
                                }
                                ?>

                                <div class="form-group m-b-20 row">
                                    <div class="col-12">
                                        <label for="emailaddress">Username</label>
                                        <?= $form->field($model, 'username')->textInput(['class' => 'form-control', 'placeholder' => 'Username', 'autofocus' => true, 'autocomplete' => 'off'])->label(false) ?>
                                    </div>
                                </div>
                                <div class="form-group row m-b-20">
                                    <div class="col-12">
                                        <label for="password">Password</label>
                                        <?= $form->field($model, 'password')->passwordInput(['class' => 'form-control', 'placeholder' => 'Password', 'autofocus' => true, 'autocomplete' => 'off'])->label(false) ?>                                    </div>
                                </div>
                                <div class="form-group row m-b-20">
                                    <div class="col-12">
                                        <?= Html::a('Forgot your Password?', ['request-password-reset'], ['class' => 'text-muted pull-right']) ?>
                                        <?php
                                        echo $form->field($model, 'rememberMe', [
                                            'options' => ['class' => 'checkbox checkbox-success'],
                                            'template' => "{input}\n{label}\n{hint}\n{error}"
                                        ])->checkbox([], false)->label('Remember me');
                                        ?>                                        
                                    </div>
                                </div>
                                <div class="form-group row text-center m-t-10">
                                    <div class="col-12">
                                        <?= Html::submitButton('Login', ['class' => 'btn btn-md btn-block btn-danger waves-effect waves-light']) ?>
                                    </div>
                                </div>
                                <?php ActiveForm::end(); ?>

                                <div class="row m-t-50">
                                    <div class="col-sm-12 text-center">
                                        <p class="text-muted">Don't have an account? <a href="<?= Url::to('golfer-registration') ?>" class="text-dark m-l-5"><b>Sign Up</b></a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>                    
                </div>                
            </div>
        </div>
    </div>
</section>
