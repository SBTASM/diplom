<?php

use kartik\depdrop\DepDrop;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Race */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="race-form">
<?php $form = ActiveForm::begin(); ?>

<div class="row">
        <div class="col-sm-12">
            <div class="col-sm-3"><?= $form->field($model, 'city')->textInput() ?></div>
            <div class="col-sm-3"><?= $form->field($model, 'club_name')->textInput(['maxlength' => true]) ?></div>
            <div class="col-sm-3"><?= $form->field($model, 'age_group_race')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\AgeGroupRace::find()->all(), 'id', 'group')) ?></div>
            <div class="col-sm-3">
            <?= $form->field($model, "owner_id")->widget(DepDrop::classname(), [
                'type'=>DepDrop::TYPE_SELECT2,
                'data'=> \yii\helpers\ArrayHelper::map(\common\models\Request::find()->all(), 'id', 'phone_number'),
                'select2Options' => ['pluginOptions' => ['allowClear'=>true]],
                'pluginOptions'=>[
                    'url' => ['#'],
                    'depends' => ["distance_id"],
                    'params'=>['input-type-1', 'input-type-2'],
                    'language' => 'ua',
                ]]) ?>
            </div>
        </div>
    </div>
<div class="row">
        <div class="col-sm-12">
            <div class="col-sm-6"><?= $form->field($model, 'name_1')->textInput(['maxlength' => true]) ?></div>

            <div class="col-sm-6"><?= $form->field($model, 'date_of_birth_1')->widget(\kartik\date\DatePicker::className(), [
                    'pluginOptions' => [
                        'endDate' => '01.01.2000',
                        'startDate' => '01.01.1890',
                    ]
                ]) ?></div>

            <div class="col-sm-6"><?= $form->field($model, 'name_2')->textInput(['maxlength' => true]) ?></div>

            <div class="col-sm-6"><?= $form->field($model, 'date_of_birth_2')->widget(\kartik\date\DatePicker::className(), [
                    'pluginOptions' => [
                        'endDate' => '01.01.2000',
                        'startDate' => '01.01.1890',
                    ]
                ]) ?>
            </div>

            <div class="col-sm-6"><?= $form->field($model, 'name_3')->textInput(['maxlength' => true]) ?></div>

            <div class="col-sm-6"><?= $form->field($model, 'date_of_birth_3')->widget(\kartik\date\DatePicker::className(), [
                    'pluginOptions' => [
                        'endDate' => '01.01.2000',
                        'startDate' => '01.01.1890',
                    ]
                ]) ?>
            </div>

            <div class="col-sm-6"><?= $form->field($model, 'name_4')->textInput(['maxlength' => true]) ?></div>

            <div class="col-sm-6"><?= $form->field($model, 'date_of_birth_4')->widget(\kartik\date\DatePicker::className(), [
                    'pluginOptions' => [
                        'endDate' => '01.01.2000',
                        'startDate' => '01.01.1890',
                    ]
                ]) ?>
            </div>
        </div>
    </div>
<div class="row">
    <div class="col-sm-12">
        <div class="text-center">

            <?= Html::submitButton(Yii::t('backend', 'Save'), ['class' => 'btn btn-success']) ?>
        </div>
    </div>
</div>
<?php ActiveForm::end() ?>
