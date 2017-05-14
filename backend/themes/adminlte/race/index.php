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
            'age_group_race',

            ['class' => \kartik\grid\ActionColumn::className()],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
