<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Playeractivity */

$this->title = 'Create Playeractivity';
$this->params['breadcrumbs'][] = ['label' => 'Playeractivities', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="playeractivity-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
