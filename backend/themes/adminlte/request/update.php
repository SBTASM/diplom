<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Request */

//$this->params['breadcrumbs'][] = ['label' => $model->last_name . ' ' . $model->first_name . ' ' . $model->pat_name, 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Запливи', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->last_name . ' ' . $model->first_name . ' ' . $model->pat_name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактирования';
?>
<div class="request-update">

    <?= $this->render('_form', [
        'model' => $model,
        'distances' => $distances
    ]) ?>

</div>
