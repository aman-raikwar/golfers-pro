<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use app\components\Alert;

$this->title = 'THANK YOU FOR ACTIVATING YOUR ACCOUNT!';
?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="wrapper-page">
                    <!-- Confirmation Screen -->
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
                                <h5 class="text-uppercase font-bold">Thank you for activating your account!</h5>
                                <p>You can now login to the Golfer Card platform to view and edit your account as well as viewing your check-ins.</p>
                                <div class="row">
                                    <div class="col-12">
                                        <hr>
                                        <a href="<?= Url::to('login') ?>" class="btn btn-md btn-block btn-danger waves-effect waves-light">Login</a>
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
