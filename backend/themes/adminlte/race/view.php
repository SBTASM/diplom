<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Race */

$this->title = $model->club_name;
$this->params['breadcrumbs'][] = ['label' => 'Естафеты', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="race-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'city',
            'club_name',
            [
                'label' => Yii::t('backend', 'Age group'),
                'attribute' => 'age_group_race',
                'value' => function($model){
                    return $model->getAgeGroupRace()->one()->group;
                }
            ],
            'name_1',
            'name_2',
            'name_3',
            'name_4',
            'date_of_birth_1',
            'date_of_birth_2',
            'date_of_birth_3',
            'date_of_birth_4',
            [
                'label' => 'Учасник',
                'attribute' => 'owner_id',
                'format' => "html",
                'value' => function($data){
                    $request = $data->getOwner()->one();
                    return Html::a($request->last_name . ' ' . $request->first_name . ' ' . $request->pat_name, ['request/view', 'id' => $request->id], ['class' => 'btn btn-link']);
                }
            ],
        ],
    ]) ?>

    <div class="row">
        <div class="col-sm-12">
            <div class="text-center">
                <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Удалить естафету?',
                        'method' => 'post',
                    ],
                ]) ?>
            </div>
        </div>
    </div>

</div>
