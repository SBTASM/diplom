<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\AgeGroup */

$this->title = Yii::t('backend', 'Update');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Age group race'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->group, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="age-group-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
