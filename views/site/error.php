<?php
/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>
<!-- HOME -->
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
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
                                <h1 class="text-error">404</h1>
                                <h2 class="text-uppercase text-danger m-t-30"><?= nl2br(Html::encode($message)) ?></h2>
                                <p class="text-muted m-t-30">
                                    It's looking like you may have taken a wrong turn. Don't worry... it
                                    happens to the best of us. You might want to check your internet connection. Here's a
                                    little tip that might help you get back on track.
                                </p>
                                <a class="btn btn-md btn-block btn-primary waves-effect waves-light m-t-20" href="<?php echo Yii::$app->request->baseUrl; ?>"> Return Home</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END HOME -->
