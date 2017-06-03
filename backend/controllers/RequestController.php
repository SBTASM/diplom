<?php

namespace backend\controllers;

use common\models\Distance;
use common\models\Distances;
use common\models\RequestForm;
use Yii;
use common\models\Request;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RequestController implements the CRUD actions for Request model.
 */
class RequestController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Request models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Request::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Request model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Request model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Request(['race' => 0]);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Request model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $distances = $model->getDistances()->all();

        $email = $model->email;

        if ($model->load(Yii::$app->request->post()) && Model::loadMultiple($distances, \Yii::$app->request->post()) && $model->save()) {
            foreach ($distances as $distance){
                $distance->save(false);
            }
            if($email !== $model->email){
                $model->send_email = 0;
                $model->save();
            }
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'distances' => $distances
            ]);
        }
    }

    /**
     * Deletes an existing Request model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Request model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Request the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Request::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionNewDistance($id){
        $model = new Distances(['owner_id' => $id]);

        if($model->load(\Yii::$app->request->post())){
            $model->owner_id = $id;

            if($model->save())
                return $this->redirect(['view', 'id' => $model->id]);
            else
                return $this->render('new-distance', ['model' => $model]);
        }

        return $this->render('new-distance', ['model' => $model]);
    }

    public function actionDeleteDistance($id){
        $model = Distances::find()->where(['id' => $id])->one();
        $owner_id = $model->owner_id;

        $model->delete();

        return $this->redirect(['update', 'id' => $owner_id]);
    }

    public function actionTest($id){
        $request = Request::findOne([$id]);

        var_dump($request->getRace()->one()); die();
    }

    public function actionSendConfirmMessage($id){

        $request = Request::find()->where(['id' => $id])->one();

        $dates = [
            '3 червня 2017 р.' => [
                '11:00 - 13:30 - реестрація учасників',
                '14:00 - 14:45 - розминка',
                '15:00 - старт',
            ],
            '4 червня 2017 р.' => [
                '09:00 - 09:45 - розминка',
                '10:00 - старт'
            ]
        ];
        $numbers = [
            'Максим' => '+380976436156',
            'Ігор' => '+380975382086',
            'Михайло' => '+380959497894',
        ];

        $mail = \Yii::$app->mailer->compose('confirm', [
            'dates' => $dates,
            'numbers' => $numbers,
            'address' => 'м. Полтава, вул. Європейська 2, офіс 419',
            'email' => \Yii::$app->params['supportEmail'],
            'username' => $request->first_name,
        ]);

        $mail->setSubject('Підтвердження реестрації на ВППО "МАСТЕРС" 3 та 4 червня 2017 року');
        $mail->setTo($request->email);
        $mail->setFrom(\Yii::$app->params['adminEmail']);

        $mail->send();

        if($request->send_email === 0) $request->send_email = true;
        $request->save();

        Yii::$app->session->setFlash('success', \Yii::t('backend', 'Confirmation message sended to {email}.', ['email' => $request->email]));

        return $this->redirect(['request/view', 'id' => $id]);
    }
}
