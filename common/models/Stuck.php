<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "stuck".
 *
 * @property int $id
 * @property int $owner_id
 * @property int $number
 * @property int $track_num
 * @property int $type_id
 * @property int $age_group_id
 * @property string $time
 *
 * @property AgeGroup $ageGroup
 * @property Request $owner
 * @property Distance $type
 */
class Stuck extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'stuck';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['owner_id', 'number', 'track_num', 'type_id', 'age_group_id'], 'required'],
            [['owner_id', 'number', 'track_num', 'type_id', 'age_group_id'], 'integer'],
            [['time'], 'string', 'max' => 255],
            [['age_group_id'], 'exist', 'skipOnError' => true, 'targetClass' => AgeGroup::className(), 'targetAttribute' => ['age_group_id' => 'id']],
            [['owner_id'], 'exist', 'skipOnError' => true, 'targetClass' => Request::className(), 'targetAttribute' => ['owner_id' => 'id']],
            [['type_id'], 'exist', 'skipOnError' => true, 'targetClass' => Distance::className(), 'targetAttribute' => ['type_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('backend', 'ID'),
            'owner_id' => Yii::t('backend', 'Owner ID'),
            'number' => Yii::t('backend', 'Number'),
            'track_num' => Yii::t('backend', 'Track Num'),
            'type_id' => Yii::t('backend', 'Type ID'),
            'age_group_id' => Yii::t('backend', 'Age Group ID'),
            'time' => Yii::t('backend', 'Time'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAgeGroup()
    {
        return $this->hasOne(AgeGroup::className(), ['id' => 'age_group_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOwner()
    {
        return $this->hasOne(Request::className(), ['id' => 'owner_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getType()
    {
        return $this->hasOne(Distance::className(), ['id' => 'type_id']);
    }

    /**
     * @inheritdoc
     * @return StuckQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new StuckQuery(get_called_class());
    }
}
