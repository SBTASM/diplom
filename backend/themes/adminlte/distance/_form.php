<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Distance */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="row">
    <?php $form = ActiveForm::begin(); ?>
    <div class="col-sm-12">
        <div class="col-sm-6"><?= $form->field($model, 'distance')->textInput(['maxlength' => true]) ?></div>
        <div class="col-sm-6"><?= $form->field($model, 'day')->dropDownList([0 => Yii::t('backend', '1-st day'), 1 => Yii::t('backend', '2-st day')]) ?></div>
    </div>
    <div class="col-sm-12">
        <div class="text-center">
            <?= Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>

<div class="distance-form">



</div>
