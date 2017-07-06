<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $user common\models\User */

$accountVerificationText = 'Account Verification';
$accountVerificationLink = Yii::$app->urlManager->createAbsoluteUrl(['site/account-verification', 'token' => $user->user_auth_key]);
?>
<div class="account-verification">
    <p>Hello <?= Html::encode($user->user_username) ?>,</p>
    <p>Follow the link below to verify your account:</p>
    <p><?= Html::a(Html::encode($accountVerificationText), $accountVerificationLink) ?></p>
</div>
