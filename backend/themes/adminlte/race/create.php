<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Race */

$request = $model->getOwner()->one();

$this->title = Yii::t('backend', 'Create race');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Races'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $request->last_name . ' ' . $request->first_name . ' ' . $request->pat_name, 'url' => ['request/view', 'id' => $request->id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="race-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
