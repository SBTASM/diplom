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

    const SCENARIO_EDIT = 'edit';

    public $distances_count_day1;
    public $distances_count_day2;

    public $license;

    public function rules()
    {
        return array_merge(parent::rules(), [
            [['distances_count_day1', 'distances_count_day2', 'license'], 'required'],
            [['distances_count_day1', 'distances_count_day2', 'license'], 'integer'],
            [['distances_count_day1', 'distances_count_day2'], 'number', 'min' => 1],
            [['license'], 'compare', 'compareValue' => '1', 'operator' => '==', 'type' => 'number', 'message' =>
            \Yii::t('frontend', 'You must agree to the license terms')]
        ]);
    }

    public function attributeLabels()
    {
        return array_merge(parent::attributeLabels(), [
            'distances_count_day1' => \Yii::t('frontend', 'Distance count of day 1'),
            'distances_count_day2' => \Yii::t('frontend', 'Distance count of day 2'),
            'license' => \Yii::t('frontend', 'license')
        ]);
    }


    public function scenarios()
    {
        return array_merge(parent::scenarios(), [
            self::SCENARIO_EDIT => [
                'first_name',
                'last_name',
                'pat_name',
                'email',
                'date_of_birth',
                'sex', 'age_group',
                'club_name', 'city',
                'phone_number'
            ],
        ]);
    }

}