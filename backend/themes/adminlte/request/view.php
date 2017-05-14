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
            'id',
            'first_name',
            'last_name',
            'date_of_birth',
            [
                'attribute' => 'sex',
                'value' => $model->sex ? 'Женский' : 'Муржской',
                'label' => 'Стать'
            ],
            [
                'attribute' => 'sex',
                'value' => function($data){ return $data->getAgeGroup()->one()['group']; },
                'label' => 'Вековая категория'
            ],
            'club_name',
            'city',
            'email:email',
            'phone_number',
            [
                'label' => 'Участвие в естафете',
                'attribute' => 'race',
                'format' => 'html',
                'value' => function($data){
                    $race = $data->getRace()->one();
                    if($data->race == 1){
                        return Html::a($race->club_name, ['race/view', 'id' => $race->id], ['class' => 'btn btn-link']);
                    }else{
                        return 'Нет';
                    }

                }
            ],
            [
                'label' => 'Дистанции',
                'format' => 'html',
                'value' => function($data){
                    /**
                     * @var $distances \common\models\Distances[]
                     */
                    $distances =  $data->getDistances()->all();

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
                <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ],
                ]) ?>
                <?= Html::a('Добавить новую дистанцию', ['new-distance', 'id' => $model->id], [
                    'class' => 'btn btn-success',
                ]) ?>
            </div>
        </div>
    </div>

</div>
