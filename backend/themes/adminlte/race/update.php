<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Race */

$owner = $model->getOwner()->one();

$this->title = Yii::t('backend', 'Update');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Races'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $owner->last_name . ' ' . $owner->first_name . ' ' . $owner->pat_name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Relays'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="race-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
