<?php

namespace backend\models;

use yii\base\Model;

class SettingsForm extends Model
{
    public $user_password;
    public $user_password_repeat;
    public $email;

    public function attributeLabels()
    {
        return [
            'user_password' => \Yii::t('backend', 'User password'),
            'user_password_repeat' => \Yii::t('backend', 'User password repeat'),
            'email' => \Yii::t('backend', 'Email')
        ];
    }

    public function rules()
    {
        return [
            [['user_password', 'user_password_repeat', 'email'], 'required'],
            [['user_password_repeat'], 'compare', 'compareAttribute' => 'user_password'],
            [['email'], 'email']
        ];
    }
}