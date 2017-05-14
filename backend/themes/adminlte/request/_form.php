<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Request */
/* @var $form yii\widgets\ActiveForm */
/* @var $distances \common\models\DistancesForm[] */
?>

<div class="request-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-sm-12">
            <div class="col-sm-3"><?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?></div>
            <div class="col-sm-3"><?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?></div>
            <div class="col-sm-3"><?= $form->field($model, 'date_of_birth')->widget(\kartik\date\DatePicker::className(), [
                    'pluginOptions' => [
                        'endDate' => '01.01.2000',
                        'startDate' => '01.01.1890'
                    ]
                ]) ?>
            </div>
            <div class="col-sm-3"><?= $form->field($model, 'sex')->dropDownList([0 => 'Мужской', 1 => 'Женский']) ?></div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="col-sm-3"><?= $form->field($model, 'club_name')->textInput(['maxlength' => true]) ?></div>
            <div class="col-sm-3">
                <?= $form->field($model, 'city') ?>
            </div>
            <div class="col-sm-3"><?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?></div>
            <div class="col-sm-3"><?= $form->field($model, 'phone_number')->widget(\yii\widgets\MaskedInput::className(), ['mask' => '+38(999)999-99-99']) ?></div>
        </div>
        <div class="col-sm-12">
            <div class="col-sm-3">
                <?= $form->field($model, 'age_group')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\AgeGroup::find()->all(), 'id', 'group')) ?>
            </div>
        </div>
    </div>
    <?php foreach ($distances as $key => $distance): ?>

        <div class="row">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="col-sm-12">
                        <div class="col-sm-4">
                            <?= $form->field($distance, "[$key]distance_id")->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\Distance::find()->all(), 'id', 'distance')) ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($distance, "[$key]pre_time")->widget(\yii\widgets\MaskedInput::className(), ['mask' => '99:99:99']) ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($distance, "[$key]day")->dropDownList([
                                    0 => 'День 1-й',
                                    1 => 'День 2-й'
                            ]) ?>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <div class="container-fluid">
                        <div class="col-sm-12">
                            <div class="text-center">
                                <?= Html::a("Удалить дистанцию", ['delete-distance', 'id' => $distance->id], [
                                    'class' => 'btn btn-danger',
                                    'data' => [
                                        'confirm' => 'Удалить дистанцию?',
                                        'method' => 'post',
                                    ]
                                ]) ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php endforeach ?>
    <div class="container-fluid">
        <div class="text-center">
            <div class="col-sm-12">
                <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>
