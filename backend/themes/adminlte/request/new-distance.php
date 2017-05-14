<?php
/**
 * @var $model Distances
 */
use yii\bootstrap\Html;

?>

<?php $form = \kartik\form\ActiveForm::begin() ?>

    <div class="row">
        <div class="col-sm-12">
            <div class="col-sm-6"><?= $form->field($model, "distance_id")->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\Distance::find()->all(), 'id', 'distance')) ?></div>
            <div class="col-sm-6"><?= $form->field($model, "pre_time")->widget(\yii\widgets\MaskedInput::className(), ['mask' => '99:99:99']) ?></div>
        </div>
    </div>
<div class="form-group">
    <?= Html::submitButton('Add', ['class' => 'btn btn-primary']) ?>
</div>

<?php \kartik\form\ActiveForm::end() ?>




