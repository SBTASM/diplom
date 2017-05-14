<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Race */

$owner = $model->getOwner()->one();

$this->title = 'Редактировать естафету: ' . $owner->last_name . ' ' . $owner->first_name . ' ' . $owner->pat_name;
$this->params['breadcrumbs'][] = ['label' => 'Естафеты', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $owner->last_name . ' ' . $owner->first_name . ' ' . $owner->pat_name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="race-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
