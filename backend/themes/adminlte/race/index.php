<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('backend', 'Race');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="race-index">
    <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'layout' => "<div align='center'>{summary}\n{items}{pager}{export}</div>",
        'columns' => [
            'id',
            [
                'attribute' => 'first_name',
                'content' => function($data){
                    $request = $data->getOwner()->one();
                    return $request->last_name . ' ' . $request->first_name . ' ' . $request->pat_name;
                },
                'label' => Yii::t('backend', 'Full name')

            ],
            'city',
            'club_name',
            [
                'label' => Yii::t('backend', 'Age group'),
                'attribute' => 'age_group_race',
                'value' => function($model){
                    return $model->getAgeGroupRace()->one()->group;
                }
            ],

            ['class' => \kartik\grid\ActionColumn::className(), 'header' => Yii::t('backend', 'Actions')],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
