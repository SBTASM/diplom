<?php
/**
 * @var $model \common\models\Distances
 */
use yii\bootstrap\Html;

$this->title = Yii::t('backend', 'Add distance');

$request = $model->getOwner()->one();

$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Requests'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $request->last_name . ' ' . $request->first_name . ' ' . $request->pat_name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = $this->title;

?>

<?php $form = \kartik\form\ActiveForm::begin() ?>

    <div class="row">
        <div class="col-sm-12">
            <div class="col-sm-4"><?= $form->field($model, "distance_id")->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\Distance::find()->all(), 'id', 'distance')) ?></div>
            <div class="col-sm-4"><?= $form->field($model, "pre_time")->widget(\yii\widgets\MaskedInput::className(), ['mask' => '99:99:99']) ?></div>
            <div class="col-sm-4"><?= $form->field($model, 'day')->dropDownList([0 => Yii::t('backend', '1-st day'), 1 => Yii::t('backend', '2-st day')]) ?></div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="text-center">
                <?= Html::submitButton(Yii::t('backend', 'Create'), ['class' => 'btn btn-primary']) ?>
            </div>
        </div>
    </div>

<?php \kartik\form\ActiveForm::end() ?>




