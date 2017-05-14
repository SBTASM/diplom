<?php

/**
 * @var $models \common\models\DistancesForm[]
 */

use kartik\widgets\DepDrop;
$this->title = "Дистанции";
?>

<?php $form = \kartik\form\ActiveForm::begin() ?>

<div class="row">
    <div class="panel panel-primary">
        <div class="panel-heading"><div class="text-center"><?= Yii::t('frontend', 'Distances') ?></div> </div>
        <div class="panel-body">
            <div class="col-sm-12">
                <div class="col-sm-6">
                    <div class="panel panel-default">
                        <div class="panel-heading"><div class="text-center"><?= Yii::t('frontend', 'Distances of day 1') ?></div></div>
                        <div class="panel-body">
                            <div class="row">
                                <?php foreach ($models as $key => $distance): ?>
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
                                <?php foreach ($models as $key => $distance): ?>
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
        <div class="panel-footer">
            <div class="text-center">
                <?php if($race == 0){ ?>
                    <?= \yii\bootstrap\Html::submitButton(Yii::t('frontend', 'Register'), ['class' => 'btn btn-danger']) ?>
                <?php }else{ ?>
                    <?= \yii\bootstrap\Html::submitButton(Yii::t('frontend', 'Next'), ['class' => 'btn btn-danger']) ?>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<?php \kartik\form\ActiveForm::end() ?>
