<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\GolfCourse */

$this->title = 'Create Golf Course';
$this->params['breadcrumbs'][] = ['label' => 'Golf Courses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="golf-course-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
