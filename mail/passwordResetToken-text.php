<?php
/* @var $this yii\web\View */
/* @var $user common\models\User */

$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['reset-password', 'token' => $user->user_activation_key]);
?>
Hello <?= $user->user_username ?>,

Follow the link below to reset your password:

<?= $resetLink ?>
