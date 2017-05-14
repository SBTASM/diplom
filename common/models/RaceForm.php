<?php

namespace  common\models;

class RaceForm extends Race{

    public function scenarios()
    {
        return array_merge(parent::scenarios(), []);
    }

    public function attributeLabels()
    {
        return array_merge(parent::attributeLabels(), [
            'name_1' => \Yii::t('frontend', 'Full name'),
            'name_2' => \Yii::t('frontend', 'Full name'),
            'name_3' => \Yii::t('frontend', 'Full name'),
            'name_4' => \Yii::t('frontend', 'Full name'),
            'date_of_birth_1' => \Yii::t('frontend', 'Date of birth'),
            'date_of_birth_2' => \Yii::t('frontend', 'Date of birth'),
            'date_of_birth_3' => \Yii::t('frontend', 'Date of birth'),
            'date_of_birth_4' => \Yii::t('frontend', 'Date of birth'),
            'club_name' => \Yii::t('frontend', 'Club name'),
            'age_group' => \Yii::t('frontend', 'Age group'),
            'city' => \Yii::t('frontend', 'City')
        ]);
    }
}