<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "distances".
 *
 * @property integer $id
 * @property integer $owner_id
 * @property integer $distance_id
 * @property integer $pre_time
 * @property integer $day
 *
 * @property Distance $distance
 * @property Request $owner
 */
class Distances extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'distances';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['owner_id', 'distance_id', 'pre_time', 'day'], 'required'],
            [['owner_id', 'distance_id', 'day'], 'integer'],
            [['pre_time'], 'string', 'max' => 255],
            [['distance_id'], 'exist', 'skipOnError' => true, 'targetClass' => Distance::className(), 'targetAttribute' => ['distance_id' => 'id']],
            [['owner_id'], 'exist', 'skipOnError' => true, 'targetClass' => Request::className(), 'targetAttribute' => ['owner_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => \Yii::t('frontend', 'ID'),
            'owner_id' => \Yii::t('frontend', 'Owner ID'),
            'distance_id' => \Yii::t('frontend', 'Distance'),
            'pre_time' => \Yii::t('frontend', 'Pre time'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDistance()
    {
        return $this->hasOne(Distance::className(), ['id' => 'distance_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOwner()
    {
        return $this->hasOne(Request::className(), ['id' => 'owner_id']);
    }

    /**
     * @inheritdoc
     * @return DistancesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DistancesQuery(get_called_class());
    }
}
