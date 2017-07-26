<?php

use yii\helpers\Html;

$accountVerificationText = 'click here';
$accountVerificationLink = Yii::$app->urlManager->createAbsoluteUrl(['account-verification', 'token' => $user->user_auth_key]);
?>

<h2>Dear <?= Html::encode($golfer->golfer_title) ?> <?= Html::encode($golfer->golfer_lastname) ?><br/><br/></h2>
<h3>Thank you for joining The Golfer Card.<br/><br/></h3>
<p>In order to complete your registration, we need to confirm your email address.</p>
<p>
    Please <?= Html::a(Html::encode($accountVerificationText), $accountVerificationLink) ?> to activate your account.
    <br/><br/><br/>
    Many Thanks,
    <br/><br/>
    The Golfer Card Team
</p>
