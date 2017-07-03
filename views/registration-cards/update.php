<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RegistrationCards */

$this->title = 'Update Registration Cards: ' . $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Registration Cards', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID, 'url' => ['view', 'id' => $model->ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="registration-cards-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
