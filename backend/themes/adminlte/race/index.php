<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Естафеты';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="race-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'id',
            'city',
            'club_name',
            'age_group',
//            'name_1',
            // 'name_2',
            // 'name_3',
            // 'name_4',
            // 'date_of_birth_1',
            // 'date_of_birth_2',
            // 'date_of_birth_3',
            // 'date_of_birth_4',
            // 'owner_id',

            ['class' => \kartik\grid\ActionColumn::className()],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
