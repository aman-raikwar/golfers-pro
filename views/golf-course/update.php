<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\GolfCourse */

$this->title = 'Update Golf Course: ' . $model->Name;
$this->params['breadcrumbs'][] = ['label' => 'Golf Courses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Name, 'url' => ['view', 'id' => $model->ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="golf-course-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
