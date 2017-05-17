<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('backend', 'Age groups');
$this->params['breadcrumbs'][] = $this->title;
?>


<?php Pjax::begin(); ?>
<div class="row">
    <div class="col-sm-12">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                'id',
                'group',

                ['class' => \kartik\grid\ActionColumn::className(), 'header' => Yii::t('backend', 'Actions')],
            ],
        ]); ?>
    </div>
    <div class="col-sm-12">
        <div class="text-center">
            <p>
                <?= Html::a(Yii::t('backend', 'Create age group'), ['create'], ['class' => 'btn btn-success']) ?>
            </p>
        </div>
    </div>
</div>
<?php Pjax::end(); ?>
