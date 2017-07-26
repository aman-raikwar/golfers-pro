<?php

use yii\helpers\Html;

$accountVerificationLink = Yii::$app->urlManager->createAbsoluteUrl(['account-verification', 'token' => $user->user_auth_key]);
?>

Dear <?= Html::encode($golfer->golfer_title) ?> <?= Html::encode($golfer->golfer_lastname) ?>,

Thank you for joining The Golfer Card.

In order to complete your registration, we need to confirm your email address.

Please <?= $accountVerificationLink ?> to activate your account.


Many Thanks,
The Golfer Card Team