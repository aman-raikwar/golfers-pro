<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Roles */

$this->title = Yii::t('app', 'Add a Role');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Roles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?= $this->render('_form', ['model' => $model]) ?>
