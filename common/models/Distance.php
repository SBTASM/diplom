<?php

namespace common\models;

/**
 * This is the model class for table "distance".
 *
 * @property integer $id
 * @property string $distance
 * @property integer $day
 *
 * @property Distances[] $distances
 */
class Distance extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'distance';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['distance', 'day'], 'required'],
            [['distance'], 'string', 'max' => 32],
            [['day'], 'integer'],
            [['distance'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => \Yii::t('frontend', 'ID'),
            'distance' => \Yii::t('frontend', 'Distance')
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDistances()
    {
        return $this->hasMany(Distances::className(), ['distance_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return DistanceQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DistanceQuery(get_called_class());
    }
}
