<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Distance */

$this->title = Yii::t('backend', 'Create distance');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Distances'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="distance-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
