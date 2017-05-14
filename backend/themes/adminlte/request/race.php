<?php

use kartik\widgets\DepDrop;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\AgeGroupRace;

/* @var $this yii\web\View */
/* @var $model common\models\Race */
/* @var $form ActiveForm */

$this->title = "Естафета";
?>
<div class="race">

    <?php $form = ActiveForm::begin(); ?>
    
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="text-center">
                Естафета
            </div>
        </div>
        <div class="panel-body">
            <div class="row">
        <div class="col-sm-12">
                        <div class="col-sm-4">
                            <?= $form->field($model, 'city_id')->widget(DepDrop::classname(), [
                                'type'=>DepDrop::TYPE_SELECT2,
                                'options' => ['placeholder' => ''],
                                'data'=> \yii\helpers\ArrayHelper::map(\common\models\City::find()->all(), 'id', 'city'),
                                'select2Options' => ['pluginOptions' => ['allowClear'=>true]],
                                'pluginOptions'=>[
                                    'placeholder' => 'Виберите город...',
                                    'url' => ['#'],
                                    'depends' => ['city_id'],
                                    'params'=>['input-type-1', 'input-type-2']
                            ]]) ?>
                        </div>
                            <div class="col-sm-4">
                                <?= $form->field($model, 'club_name') ?>
                            </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'age_group')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\AgeGroupRace::find()->all(), 'id', 'group')) ?>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="col-sm-6">
                            <?= $form->field($model, 'date_of_birth_1')->widget(\kartik\date\DatePicker::className(), [
                                'pluginOptions' => [
                                    'endDate' => '01.01.2000',
                                    'startDate' => '01.01.1890',
                                ]
                            ]) ?>
                        </div>
                        <div class="col-sm-6">
                            <?= $form->field($model, 'name_1') ?>
                        </div>
                    </div>
                <div class="col-sm-12">
                    <div class="col-sm-6">
                            <?= $form->field($model, 'date_of_birth_2')->widget(\kartik\date\DatePicker::className(), [
                                'pluginOptions' => [
                                    'endDate' => '01.01.2000',
                                    'startDate' => '01.01.1890',
                                ]
                            ]) ?>
                        </div>
                    <div class="col-sm-6">
                        <?= $form->field($model, 'name_2') ?>
                    </div>
                </div>
            <div class="col-sm-12">
                <div class="col-sm-6">
                    <?= $form->field($model, 'date_of_birth_3')->widget(\kartik\date\DatePicker::className(), [
                        'pluginOptions' => [
                                'endDate' => '01.01.2000',
                                'startDate' => '01.01.1890',
                            ]
                    ]) ?>
                </div>
                    <div class="col-sm-6">
                        <?= $form->field($model, 'name_3') ?>
                    </div>
                </div>
            <div class="col-sm-12">
                <div class="col-sm-6">
                    <?= $form->field($model, 'date_of_birth_4')->widget(\kartik\date\DatePicker::className(), [
                        'pluginOptions' => [
                                'endDate' => '01.01.2000',
                                'startDate' => '01.01.1890',
                            ]
                    ]) ?>
                </div>
                    <div class="col-sm-6">
                        <?= $form->field($model, 'name_4') ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel-footer">
            <div class="row">
                <div class="text-center">
                     <div class="row">
                        <div class="col-sm-12">
                            <div class="push-right">
                                <div class="form-group">
                                    <?= Html::submitButton('Подать заявку', ['class' => 'btn btn-primary']) ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
   

    <?php ActiveForm::end(); ?>

</div>
