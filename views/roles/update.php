<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Roles */

$this->title = Yii::t('app', 'Update {modelClass}: ', ['modelClass' => 'Roles']) . $model->role_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Roles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->role_id, 'url' => ['view', 'id' => $model->role_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="roles-update">
    <?= $this->render('_form', ['model' => $model]) ?>
</div>
