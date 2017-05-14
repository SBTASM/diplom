<?php
/**
 * Created by PhpStorm.
 * User: Machine
 * Date: 03.03.2017
 * Time: 9:59
 */

namespace common\models;


/**
 * Class RequestForm
 * @package common\models
 * @property integer $distances_count_day1
 * @property integer $distances_count_day2
 */

class RequestForm extends Request
{
    public $distances_count_day1;
    public $distances_count_day2;

    public function rules()
    {
        return array_merge(parent::rules(), [
            [['distances_count_day1', 'distances_count_day2'], 'required'],
            [['distances_count_day1', 'distances_count_day2'], 'integer'],
            [['distances_count_day1', 'distances_count_day2'], 'number', 'min' => 1],
        ]);
    }

    public function attributeLabels()
    {
        return array_merge(parent::attributeLabels(), [
            'distances_count_day1' => \Yii::t('frontend', 'Distance count of day 1'),
            'distances_count_day2' => \Yii::t('frontend', 'Distance count of day 2'),
        ]);
    }
}