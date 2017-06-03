<?php

use kartik\checkbox\CheckboxX;
use kartik\widgets\DepDrop;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Request */
/* @var $form yii\widgets\ActiveForm */
/* @var $distances \common\models\DistancesForm[] */
/* @var $race \common\models\Race */
?>

<div class="request-form">
    <?php $form = ActiveForm::begin([]) ?>
    <div class="row">
        <div class="col-sm-12">
            <div class="col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="col-sm-12">
                            <?= DetailView::widget([
                                'model' => $model,
                                'attributes' => [
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
                                ],
                            ]) ?>
                        </div>
                        <?php if(!is_null($race)){ ?>
                            <div class="col-sm-12">
                                <?= DetailView::widget([
                                    'model' => $race,
                                    'attributes' => [
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
                                    ],
                                ]) ?>
                            </div>
                        <?php } ?>
                        <?php if(count($distances) !== 0){ ?>
                            <div class="col-sm-12">
                                <div class="col-sm-6">
                                    <div class="panel panel-default">
                                        <div class="panel-heading"><div class="text-center"><?= Yii::t('frontend', 'Distances of day 1') ?></div></div>
                                        <div class="panel-body">
                                            <div class="row">
                                                <?php foreach ($distances as $key => $distance): ?>
                                                    <?php if($distance->day == false){ ?>
                                                        <div class="col-sm-12">
                                                            <div class="col-sm-12">
                                                                <?= DetailView::widget([
                                                                    'model' => $distance,
                                                                    'attributes' => [
                                                                        'pre_time',
                                                                        [
                                                                            'label' => 'Дистанция',
                                                                            'attribute' => 'distance_id',
                                                                            'value' => function($data){
                                                                                return $data->getDistance()->one()->distance;
                                                                            }
                                                                        ]
                                                                    ]
                                                                ]) ?>
                                                            </div>
                                                        </div>
                                                    <?php } ?>
                                                <?php endforeach ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="panel panel-default">
                                        <div class="panel-heading"><div class="text-center"><?= Yii::t('frontend', 'Distances of day 2') ?></div></div>
                                        <div class="panel-body">
                                            <div class="row">
                                                <?php foreach ($distances as $key => $distance): ?>
                                                    <?php if($distance->day == true){ ?>
                                                        <div class="col-sm-12">
                                                            <div class="col-sm-12">
                                                                <?= DetailView::widget([
                                                                    'model' => $distance,
                                                                    'attributes' => [
                                                                        'pre_time',
                                                                        [
                                                                            'label' => 'Дистанция',
                                                                            'attribute' => 'distance_id',
                                                                            'value' => function($data){
                                                                                return $data->getDistance()->one()->distance;
                                                                            }
                                                                        ]
                                                                    ]
                                                                ]) ?>
                                                            </div>
                                                        </div>
                                                    <?php } ?>
                                                <?php endforeach ?>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php ActiveForm::end() ?>
</div>
