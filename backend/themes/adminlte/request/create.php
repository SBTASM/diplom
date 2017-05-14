<?php

use kartik\checkbox\CheckboxX;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\models\Request */

$this->title = 'Создать заявку';
$this->params['breadcrumbs'][] = ['label' => 'Заявки', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?php \yii\widgets\Pjax::begin() ?>
<div class="request-create">
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
                    <div class="col-sm-3"> <?= $form->field($model, 'sex')->dropDownList([0 => 'Мужчина', 1 => 'Женщина']) ?></div>
                    <div class="col-sm-3"> <?= $form->field($model, 'age_group')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\AgeGroup::find()->all(), 'id', 'group'), []) ?></div>
                    <div class="col-sm-3"> <?= $form->field($model, 'distances_count_day1', ['options' => ['id' => 'count_day1']])->textInput(['type' => 'number'])?></div>
                    <div class="col-sm-3"> <?= $form->field($model, 'distances_count_day2', ['options' => ['id' => 'count_day2']])->textInput(['type' => 'number'])?></div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="col-sm-3 col-sm-push-9">
                        <?= $form->field($model, 'race')->widget(CheckboxX::classname(), [
                            'autoLabel' => true,
                            'name'=>'s_1',
                            'options' => [
                                'race' => 's_1',
                            ],
                            'pluginOptions' => [
                                'threeState' => false
                            ]
                        ])->label(false); ?>
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
                        <?= Html::submitButton('Далі', ['class' => 'btn btn-primary']) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<?php ActiveForm::end() ?>
</div>
<?php \yii\widgets\Pjax::end() ?>
