<?php

/**
 * @var $model \backend\models\SettingsForm
 */

$this->title = Yii::t('backend', 'Settings');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Settings')];

?>

<div class="settings-index">
    <?php $form = \kartik\form\ActiveForm::begin() ?>
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="text-center">
                        <?= Yii::t('backend', 'User settings') ?>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="col-sm-12">
                        <div class="col-sm-4">
                            <?= $form->field($model, 'user_password')->passwordInput() ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'user_password_repeat')->passwordInput() ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'email') ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="text-center">
                <?= \yii\helpers\Html::submitButton(Yii::t('backend', 'Save'), ['class' => 'btn btn-primary']) ?>
            </div>
        </div>
    </div>
    <?php $form::end() ?>
</div>
