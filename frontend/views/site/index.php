<?php

use kartik\form\ActiveForm;
use kartik\widgets\DepDrop;
use yii\bootstrap\Html;
use kartik\checkbox\CheckboxX;

/* @var $this yii\web\View */
/* @var $model \common\models\Request */

$this->title = Yii::t('frontend', 'Registration form');
?>

<div class="site-index">
    <?php $form = ActiveForm::begin(['id' => 'requestForm', 'options' => ['data-pjax' => true]]) ?>

    <div class="row">
        <div class="col-sm-12">
            <div class="text-center">
                <div class="alert alert-info">
                    <?= Html::tag('strong', Yii::t('frontend', 'Header message')) ?>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="text-center"><?= Yii::t('frontend', 'Create request') ?></div>
                </div>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="col-sm-3"><?= $form->field($model, 'first_name') ?></div>
                        <div class="col-sm-3"><?= $form->field($model, 'last_name') ?></div>
                        <div class="col-sm-3"><?= $form->field($model, 'pat_name') ?></div>
                        <div class="col-sm-3"><?= $form->field($model, 'date_of_birth')->widget(\kartik\date\DatePicker::className(), [
                                'pluginOptions' => [
                                    'endDate' => '01.01.2000',
                                    'startDate' => '01.01.1890',
                                ]
                            ]) ?></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="col-sm-3"><?= $form->field($model, 'club_name') ?></div>
                        <div class="col-sm-3"><?= $form->field($model, 'city') ?></div>
                        <div class="col-sm-3"><?= $form->field($model, 'email') ?></div>
                        <div class="col-sm-3"><?= $form->field($model, 'phone_number')->widget(\yii\widgets\MaskedInput::className(), ['mask' => '+38(999)999-99-99'])?></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="col-sm-3"> <?= $form->field($model, 'sex')->dropDownList([0 => Yii::t('frontend', 'Man'), 1 => Yii::t('frontend', 'Woman')]) ?></div>
                        <div class="col-sm-3"> <?= $form->field($model, 'age_group')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\AgeGroup::find()->all(), 'id', 'group')) ?></div>
                        <div class="col-sm-3"> <?= $form->field($model, 'distances_count_day1')->textInput(['type' => 'number'])?></div>
                        <div class="col-sm-3"> <?= $form->field($model, 'distances_count_day2')->textInput(['type' => 'number'])?></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="col-sm-3 col-sm-push-9">
                            <?= $form->field($model, 'race')->widget(CheckboxX::classname(), [
                                'autoLabel' => false,
                                'name'=>'s_1',
                                'options' => [
                                    'race' => 's_1',
                                ],
                                'pluginOptions' => [
                                    'threeState' => false
                                ]
                            ]) ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel-footer">
                <div class="row">
                    <div class="text-center">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <?= Html::submitButton(Yii::t('frontend', 'Next'), ['class' => 'btn btn-primary']) ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php ActiveForm::end() ?>
</div>
