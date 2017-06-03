<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 002 02.06.17
 * Time: 5:38
 */

namespace backend\controllers;


use backend\models\SettingsForm;
use common\models\User;
use yii\web\Controller;

class SettingsController extends Controller
{

    public function actionIndex(){
        $model = new SettingsForm();

        if($model->load(\Yii::$app->request->post()) && $model->validate()){
            $user = User::find()->where(['id' => \Yii::$app->user->id])->one();

            $user->setPassword($model->user_password);
            $user->email = $model->email;

            if($user->save()){
                \Yii::$app->session->setFlash('success', \Yii::t('backend', 'Settings saved complete.'));
                return $this->redirect(\Yii::$app->getHomeUrl());
            }else{
                \Yii::$app->session->setFlash('danger', \Yii::t('backend', 'Don\`t saved. Error<br>{error_text}'), ['error_text' => $user->getErrors()]);
            }

        }

        return $this->render('index.php', ['model' => $model]);
    }
}