<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\GolfCourse */

$this->title = 'Add a Golf Club';
$this->params['breadcrumbs'][] = ['label' => 'Golf Courses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="golf-course-create">    
    <?= $this->render('_form', ['model' => $model]); ?>
</div>
