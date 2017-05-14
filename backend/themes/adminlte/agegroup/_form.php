<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\AgeGroup */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="row">
    <div class="col-sm-12">
        <?php $form = ActiveForm::begin(); ?>
        <?= $form->field($model, 'group')->textInput(['maxlength' => true]) ?>
        <?php ActiveForm::end(); ?>
    </div>
    <div class="col-sm-12">
        <div class="text-center">
            <?= Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    </div>
</div>
