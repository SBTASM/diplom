<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Заявки';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="request-index">
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'layout' => "<div align='center'>{summary}\n{items}{pager}{export}</div>",
        'options' => ['class' => 'text-center'],
        'columns' => [
            'id',
            [
                'attribute' => 'first_name',
                'content' => function($data){
                    return $data->first_name . ' ' . $data->last_name . ' ' . $data->pat_name;
                },
                'label' => 'Имя'

            ],
            'date_of_birth',
            [
                'attribute' => 'sex',
                'content' => function($data){
                    return $data->sex ? 'Женский' : 'Мужской';
                }
            ],
			'city',
            // 'email:email',
             'phone_number',

            [
                'label' => 'Дистанции',
                'format' => 'text',
                'value' => function ($model) {
                    return $model->getDistances()->count();
                },
            ],

            [
                'attribute' => 'race',
                'format' => 'boolean',
                'label' => 'Участвие в естафете'
            ],

            ['class' => \kartik\grid\ActionColumn::className()],
        ],
        'toolbar' => [
            '{export}',
        ],
        'exportConfig' => [
            GridView::CSV => [],
            GridView::HTML => [],
            GridView::PDF => [],
            GridView::EXCEL => [],
            GridView::JSON => [],
            GridView::TEXT => [],
        ],
        //'toggleDataContainer' => ['class' => 'btn-group-sm'],
        //'exportContainer' => ['class' => 'btn-group-sm'],
    ]); ?>
<?php Pjax::end(); ?></div>
