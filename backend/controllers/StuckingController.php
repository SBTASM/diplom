<?php

namespace backend\controllers;

use common\models\Distances;
use yii\data\ActiveDataProvider;
use yii\data\ArrayDataProvider;

class StuckingController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $distances = Distances::find()->all();
        
        $distances_by_type = array();

        foreach ($distances as $distance) {
            $distances_by_type[$distance->getDistance()->one()->distance] = Distances::find()->where(['distance_id' => $distance->distance_id]);
        }

        return $this->render('index');
    }
}
