<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Distance */

$this->title = Yii::t('backend', 'Update Distance');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Distances'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="distance-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
