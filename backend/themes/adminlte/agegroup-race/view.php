<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\AgeGroup */

$this->title = $model->group;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Age group race'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="age-group-view">
    <div class="row">
        <div class="col-sm-12">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',
                    'group',
                ],
            ]) ?>
        </div>
        <div class="col-sm-12">
            <div class="text-center">
                <?= Html::a(Yii::t('backend', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                <?= Html::a(Yii::t('backend', 'Delete'), ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => Yii::t('backend', 'Are you sure you want to delete this item?'),
                        'method' => 'post',
                    ],
                ]) ?>
            </div>
        </div>
    </div>
</div>
