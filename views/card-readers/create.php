<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CardReaders */

$this->title = 'Create Card Readers';
$this->params['breadcrumbs'][] = ['label' => 'Card Readers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card-readers-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
