<?php

use yii\helpers\Html;
?>

<div class="account-verification">
    <p>Hello Admin!</p>
    <p>We need more Golfer Cards for our Club.</p>
    <table>
        <tr>
            <th>Club Username</th>
            <td><?= Html::encode($user->user_username) ?></td>
        </tr>
        <tr>
            <th>Club Email</th>
            <td><?= Html::encode($user->user_email) ?></td>
        </tr>
        <tr>
            <th>Number of Cards required</th>
            <td><b><?= Html::encode($number_of_cards) ?></b></td>
        </tr>
    </table>    
</div>
