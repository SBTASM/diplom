<?php

use kartik\checkbox\CheckboxX;
use kartik\widgets\DepDrop;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Request */
/* @var $form yii\widgets\ActiveForm */
/* @var $distances \common\models\DistancesForm[] */
?>

<div class="request-form">
    <?php $form = ActiveForm::begin([]) ?>
    <div class="row">
        <div class="col-sm-12">
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
                    <div class="col-sm-3"><?= $form->field($model, 'phone_number')->widget(\yii\widgets\MaskedInput::className(), ['mask' => '+38(999)999-99-99']) ?></div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="col-sm-3"> <?= $form->field($model, 'sex')->dropDownList([0 => Yii::t('backend', 'Man'), 1 => Yii::t('backend', 'Woman')]) ?></div>
                    <div class="col-sm-3"> <?= $form->field($model, 'age_group')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\AgeGroup::find()->all(), 'id', 'group'), []) ?></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="col-sm-6">
                <div class="panel panel-default">
                    <div class="panel-heading"><div class="text-center"><?= Yii::t('frontend', 'Distances of day 1') ?></div></div>
                    <div class="panel-body">
                        <div class="row">
                            <?php foreach ($distances as $key => $distance): ?>
                                <?php if($distance->day == false){ ?>
                                    <div class="col-sm-12">
                                        <div class="col-sm-6">
                                            <?= $form->field($distance, "[$key]distance_id")->widget(DepDrop::classname(), [
                                                'type'=>DepDrop::TYPE_SELECT2,
                                                'data'=> \yii\helpers\ArrayHelper::map(\common\models\Distance::find()->where(['day' => 0])->all(), 'id', 'distance'),
                                                'select2Options' => ['pluginOptions' => ['allowClear'=>true]],
                                                'pluginOptions'=>[
                                                    'url' => ['#'],
                                                    'depends' => ["distance_id"],
                                                    'params'=>['input-type-1', 'input-type-2']
                                                ]]) ?>
                                        </div>
                                        <div class="col-sm-6">
                                            <?= $form->field($distance, "[$key]pre_time")->widget(\yii\widgets\MaskedInput::className(), ['mask' => '99:99:99'])
                                            ?>
                                        </div>
                                    </div>
                                <?php } ?>
                            <?php endforeach ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="panel panel-default">
                    <div class="panel-heading"><div class="text-center"><?= Yii::t('frontend', 'Distances of day 2') ?></div></div>
                    <div class="panel-body">
                        <div class="row">
                            <?php foreach ($distances as $key => $distance): ?>
                                <?php if($distance->day == true){ ?>
                                    <div class="col-sm-12">
                                        <div class="col-sm-6">
                                            <?= $form->field($distance, "[$key]distance_id")->widget(DepDrop::classname(), [
                                                'type'=>DepDrop::TYPE_SELECT2,
                                                'data'=> \yii\helpers\ArrayHelper::map(\common\models\Distance::find()->where(['day' => 1])->all(), 'id', 'distance'),
                                                'select2Options' => ['pluginOptions' => ['allowClear'=>true]],
                                                'pluginOptions'=>[
                                                    'url' => ['#'],
                                                    'depends' => ["distance_id"],
                                                    'params'=>['input-type-1', 'input-type-2']
                                                ]]) ?>
                                        </div>
                                        <div class="col-sm-6">
                                            <?= $form->field($distance, "[$key]pre_time")->widget(\yii\widgets\MaskedInput::className(), ['mask' => '99:99:99']) ?>
                                        </div>
                                    </div>
                                <?php } ?>
                            <?php endforeach ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="text-center">
                <div class="col-sm-12">
                    <div class="form-group">
                        <?= Html::submitButton(Yii::t('backend', 'Save'), ['class' => 'btn btn-primary']) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php ActiveForm::end() ?>
</div>
