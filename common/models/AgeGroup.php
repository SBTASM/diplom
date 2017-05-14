<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "age_group".
 *
 * @property integer $id
 * @property string $group
 *
 * @property Request[] $requests
 */
class AgeGroup extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'age_group';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['group'], 'required'],
            [['group'], 'string', 'max' => 32],
            [['group'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => \Yii::t('frontend', 'ID'),
            'group' => \Yii::t('frontend', 'Group')
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRequests()
    {
        return $this->hasMany(Request::className(), ['age_group' => 'id']);
    }

    /**
     * @inheritdoc
     * @return AgeGroupQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AgeGroupQuery(get_called_class());
    }
}
