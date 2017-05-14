<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Race */

$this->title = Yii::t('backend', 'Create race');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Races'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="race-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
