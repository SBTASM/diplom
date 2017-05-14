<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Request */

$this->title = $model->last_name . ' ' . $model->first_name . ' ' . $model->pat_name;
$this->params['breadcrumbs'][] = ['label' => 'Запливи', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="request-view">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'label' => Yii::t('backend', 'ID'),
                'attribute' => 'id',
            ],
            'first_name',
            'last_name',
            'date_of_birth',
            [
                'attribute' => 'sex',
                'value' => $model->sex ? Yii::t('backend', 'Woman') : Yii::t('backend', 'Man'),
                'label' => Yii::t('backend', 'Sex')
            ],
            [
                'attribute' => 'sex',
                'value' => function($data){ return $data->getAgeGroup()->one()['group']; },
                'label' => Yii::t('backend', 'Age group')
            ],
            'club_name',
            'city',
            'email:email',
            'phone_number',
            [
                'label' => Yii::t('backend', 'Race'),
                'attribute' => 'race',
                'format' => 'html',
                'value' => function($data){
                    $race = $data->getRace()->one();
                    if($data->race == 1){
                        return Html::a($race->club_name, ['race/view', 'id' => $race->id], ['class' => 'btn btn-link']);
                    }else{
                        return Yii::t('backend', 'No');
                    }

                }
            ],
            [
                'label' => Yii::t('backend', 'Distances'),
                'format' => 'html',
                'value' => function($data){
                    /**
                     * @var $distances \common\models\Distances[]
                     */
                    $distances =  $data->getDistances()->all();

                    if(count($distances) === 0){
                        return Yii::t('backend', 'Distances not found.');
                    }

                    return Html::ul($distances, ['item' => function($item, $index){
                        $distance = $item->getDistance()->one();
                        $name = $distance->distance . ' - ' . $item->pre_time;
                        if($distance->day == 0) $name .= " - 1-й день";
                        else $name .= ' - 2-й день';
                        return Html::a($name, ['distance/view', 'id' => $distance->id], ['class' => 'btn btn-link']) . "<br>";
                    }]);
                }

            ]
        ],
    ]) ?>

    <div class="row">
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
                <?= Html::a(Yii::t('backend', 'Create new distance'), ['new-distance', 'id' => $model->id], [
                    'class' => 'btn btn-success',
                ]) ?>
                <?= Html::a(Yii::t('backend', 'Add relays'), ['race/create'], [
                    'class' => 'btn btn-default',
                ]) ?>
            </div>
        </div>
    </div>

</div>
