<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $user common\models\User */

$websiteText = 'Click here to go for Login';
$websiteLink = Yii::$app->urlManager->createAbsoluteUrl(['site/index']);
?>
<div class="account-verification">
    <p>Hello <?= Html::encode($user->user_username) ?>,</p>
    <p>You are registered at "<b><?= Yii::$app->name; ?></b>", your login credentials are below:</p>
    <table>
        <tr>
            <th>Username</th>
            <td><?= Html::encode($user->user_username) ?></td>
        </tr>
        <tr>
            <th>Password</th>
            <td><?= Html::encode($tempPassword) ?></td>
        </tr>        
    </table>
    <p>Follow the link below to login to your account:</p>
    <p><?= Html::a(Html::encode($websiteText), $websiteLink) ?></p>
</div>
