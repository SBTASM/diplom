<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\AgeGroup */

$this->title = Yii::t('backend', 'Create age group');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Age groups'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="age-group-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
