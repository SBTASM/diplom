<?php

use kartik\checkbox\CheckboxX;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Request */
/* @var $form yii\widgets\ActiveForm */
/* @var $distances \common\models\DistancesForm[] */
?>

<div class="request-form">
    <?php $form = ActiveForm::begin(
        [
            'action' => Url::to(['request/create']),
            'options' => ['data-pjax' => '1']
        ])
    ?>
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
            <div class="row">
                <div class="col-sm-12">
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
