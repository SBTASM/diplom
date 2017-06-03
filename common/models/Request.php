<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "request".
 *
 * @property integer $id
 * @property string $first_name
 * @property string $last_name
 * @property string $pat_name
 * @property integer $date_of_birth
 * @property integer $sex
 * @property integer $age_group
 * @property string $club_name
 * @property string $city
 * @property string $email
 * @property string $phone_number
 * @property integer race
 * @property integer send_email
 *
 * @property Distances[] $distances
 * @property AgeGroup $ageGroup
 */
class Request extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'request';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['city', 'first_name', 'last_name', 'date_of_birth', 'age_group', 'club_name', 'email', 'phone_number', 'pat_name', 'race'], 'required'],
            [['sex', 'age_group', 'race', 'send_email'], 'integer'],
            [['city', 'date_of_birth', 'phone_number', 'first_name', 'last_name', 'club_name', 'email', 'pat_name'], 'string', 'max' => 255],
            [['age_group'], 'exist', 'skipOnError' => true, 'targetClass' => AgeGroup::className(), 'targetAttribute' => ['age_group' => 'id']],
            [['phone_number', 'email'], 'unique'],
            [['email'], 'email']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => \Yii::t('frontend', 'First name'),
            'last_name' => \Yii::t('frontend', 'Last name'),
            'date_of_birth' => \Yii::t('frontend', 'Date of birth'),
            'sex' => \Yii::t('frontend', 'Sex'),
            'age_group' => \Yii::t('frontend', 'Age group'),
            'club_name' => \Yii::t('frontend', 'Club name'),
            'city' => \Yii::t('frontend', 'City'),
            'email' => \Yii::t('frontend', 'Email'),
            'phone_number' => \Yii::t('frontend', 'Phone number'),
            'pat_name' => \Yii::t('frontend', 'Pat name'),
            'race' => \Yii::t('frontend', 'Race'),
            'send_email' => Yii::t('frontend', 'Confirmation send')
        ];
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDistances()
    {
        return $this->hasMany(Distances::className(), ['owner_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRace()
    {
        return $this->hasOne(Race::className(), ['owner_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAgeGroup()
    {
        return $this->hasOne(AgeGroup::className(), ['id' => 'age_group']);
    }

    /**
     * @inheritdoc
     * @return RequestQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new RequestQuery(get_called_class());
    }

    /**
     * @inheritdoc
     * @return string
     */
    public function getFullName(){
        return $this->last_name . ' ' . $this->first_name . ' ' . $this->pat_name;
    }
}
