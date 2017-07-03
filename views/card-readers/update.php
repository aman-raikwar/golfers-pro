<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CardReaders */

$this->title = 'Update Card Readers: ' . $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Card Readers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID, 'url' => ['view', 'id' => $model->ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="card-readers-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
