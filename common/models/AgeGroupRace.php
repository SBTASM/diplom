<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "age_group_race".
 *
 * @property int $id
 * @property string $group
 *
 * @property Race[] $races
 */
class AgeGroupRace extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'age_group_race';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['group'], 'required'],
            [['group'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('frontend', 'ID'),
            'group' => Yii::t('frontend', 'Group'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRaces()
    {
        return $this->hasMany(Race::className(), ['age_group' => 'id']);
    }

    /**
     * @inheritdoc
     * @return AgeGroupRaceQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AgeGroupRaceQuery(get_called_class());
    }
}
