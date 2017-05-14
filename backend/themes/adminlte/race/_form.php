<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Race */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="race-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="panel">
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="col-sm-4"><?= $form->field($model, 'city')->textInput() ?></div>
                        <div class="col-sm-4"><?= $form->field($model, 'club_name')->textInput(['maxlength' => true]) ?></div>
                        <div class="col-sm-4"><?= $form->field($model, 'age_group')->textInput() ?></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="col-sm-6"><?= $form->field($model, 'name_1')->textInput(['maxlength' => true]) ?></div>

                        <div class="col-sm-6"><?= $form->field($model, 'date_of_birth_1')->textInput(['maxlength' => true]) ?></div>

                        <div class="col-sm-6"><?= $form->field($model, 'name_2')->textInput(['maxlength' => true]) ?></div>

                        <div class="col-sm-6"><?= $form->field($model, 'date_of_birth_2')->textInput(['maxlength' => true]) ?></div>


                        <div class="col-sm-6"><?= $form->field($model, 'name_3')->textInput(['maxlength' => true]) ?></div>

                        <div class="col-sm-6"><?= $form->field($model, 'date_of_birth_3')->textInput(['maxlength' => true]) ?></div>

                        <div class="col-sm-6"><?= $form->field($model, 'name_4')->textInput(['maxlength' => true]) ?></div>

                        <div class="col-sm-6"><?= $form->field($model, 'date_of_birth_4')->textInput(['maxlength' => true]) ?></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="col-sm-4">
                                <?= $form->field($model, 'owner_id')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\Request::find()->all(), 'id', 'phone_number')) ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

























    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
