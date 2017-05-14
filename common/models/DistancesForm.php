<?php

namespace common\models;

class DistancesForm extends Distances{
    public function attributeLabels()
    {
        return array_merge(parent::attributeLabels(), [
            'distance_id' => \Yii::t('frontend', 'Distance')
        ]);
    }
}