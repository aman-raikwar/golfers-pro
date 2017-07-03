<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\RegistrationCards */

$this->title = 'Create Registration Cards';
$this->params['breadcrumbs'][] = ['label' => 'Registration Cards', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="registration-cards-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
