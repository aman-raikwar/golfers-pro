<?php
/* @var $this yii\web\View */
/* @var $user common\models\User */

$accountVerificationLink = Yii::$app->urlManager->createAbsoluteUrl(['account-verification', 'token' => $user->user_auth_key]);
?>
Hello <?= $user->user_username ?>,

Follow the link below to verify your account:

<?= $accountVerificationLink ?>
