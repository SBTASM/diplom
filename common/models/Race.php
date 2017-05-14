<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "race".
 *
 * @property int $id
 * @property int $city
 * @property string $club_name
 * @property int $age_group_race
 * @property string $name_1
 * @property string $name_2
 * @property string $name_3
 * @property string $name_4
 * @property string $date_of_birth_1
 * @property string $date_of_birth_2
 * @property string $date_of_birth_3
 * @property string $date_of_birth_4
 * @property int $owner_id
 *
 * @property AgeGroupRace $ageGroupRace
 * @property Request $owner
 */
class Race extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'race';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['city', 'club_name', 'age_group_race', 'name_1', 'name_2', 'name_3', 'name_4', 'date_of_birth_1', 'date_of_birth_2', 'date_of_birth_3', 'date_of_birth_4', 'owner_id'], 'required'],
            [['age_group', 'owner_id'], 'integer'],
            [['city', 'club_name', 'name_1', 'name_2', 'name_3', 'name_4', 'date_of_birth_1', 'date_of_birth_2', 'date_of_birth_3', 'date_of_birth_4'], 'string', 'max' => 255],
            [['age_group_race'], 'exist', 'skipOnError' => true, 'targetClass' => AgeGroupRace::className(), 'targetAttribute' => ['age_group' => 'id']],
            [['owner_id'], 'exist', 'skipOnError' => true, 'targetClass' => Request::className(), 'targetAttribute' => ['owner_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => \Yii::t('frontend', 'Full name'),
            'city' => \Yii::t('frontend', 'City'),
            'club_name' => \Yii::t('frontend', 'Club name'),
            'age_group_race' => \Yii::t('frontend', 'Age group'),
            'name_1' => \Yii::t('frontend', 'Full name'),
            'name_2' => \Yii::t('frontend', 'Full name'),
            'name_3' => \Yii::t('frontend', 'Full name'),
            'name_4' => \Yii::t('frontend', 'Full name'),
            'date_of_birth_1' => \Yii::t('frontend', 'Date of birth'),
            'date_of_birth_2' => \Yii::t('frontend', 'Date of birth'),
            'date_of_birth_3' => \Yii::t('frontend', 'Date of birth'),
            'date_of_birth_4' => \Yii::t('frontend', 'Date of birth'),
            'owner_id' => \Yii::t('frontend', 'Request'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAgeGroup()
    {
        return $this->hasOne(AgeGroup::className(), ['id' => 'age_group']);
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
     * @return RaceQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new RaceQuery(get_called_class());
    }
}
