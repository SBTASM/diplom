<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('backend', 'Distances');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="distance-index">
    <div class="row">
        <div class="col-sm-12">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#panel1"><?= Yii::t('backend', '1-st day') ?></a></li>
                <li><a data-toggle="tab" href="#panel2"><?= Yii::t('backend', '2-st day') ?></a></li>
            </ul>
            <div class="tab-content">
                <div id="panel1" class="tab-pane fade in active">
                    <?= GridView::widget([
                        'dataProvider' => $dataProvider_day1,
                        'columns' => [

                            'id',
                            'distance',

                            ['class' => \kartik\grid\ActionColumn::className()],
                        ],
                    ]); ?>
                </div>
                <div id="panel2" class="tab-pane fade">
                    <?= GridView::widget([
                        'dataProvider' => $dataProvider_day2,
                        'columns' => [

                            'id',
                            'distance',

                            ['class' => \kartik\grid\ActionColumn::className()],
                        ],
                    ]); ?>
                </div>
            </div>
            <div class="text-center">
                <p><?= Html::a(Yii::t('backend', 'Create distance'), ['create'], ['class' => 'btn btn-success']) ?></p>
            </div>
        </div>
    </div>


<?php Pjax::begin(); ?>

<?php Pjax::end(); ?></div>
