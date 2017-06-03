<?php
namespace frontend\controllers;


use common\models\DistancesForm;
use common\models\RaceForm;
use common\models\Request;
use common\models\RequestForm;
use yii\base\Model;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;


/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }
    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }
    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex(){
        $model = new RequestForm(['race' => 0]);

        if(\Yii::$app->request->getIsPost() && $model->load(\Yii::$app->request->post()) && $model->validate()){
            $request_array = ArrayHelper::toArray($model);
            $request_array = ArrayHelper::merge([
                'distances_count_day1' => $model->distances_count_day1,
                'distances_count_day2' => $model->distances_count_day2
            ], $request_array);
            \Yii::$app->session->set('request_form', $request_array);
            return $this->redirect(['site/distances']);
        }

        return $this->render('index', ['model' => $model]);
    }
    public function actionDistances(){
        $request_form = new RequestForm(\Yii::$app->session->get('request_form'));
        $models = array();

        for($i = 0; $i < $request_form->distances_count_day1; $i++){
            $models[] = new DistancesForm(['day' => 0]);
        }
        for($i = 0; $i < $request_form->distances_count_day2; $i++){
            $models[] = new DistancesForm(['day' => 1]);
        }

        if(Model::loadMultiple($models, \Yii::$app->request->post()) && \Yii::$app->request->getIsPost()){
            if($request_form->race == 1){
                \Yii::$app->session->set('distances_form', ArrayHelper::toArray($models));
                return $this->redirect(['site/race']);
            }else{
                $this->saveModels($request_form, $models);

                //Mb error?
                $this->sendConfirmMessage($request_form->first_name, $request_form->email, $request_form->id);

                return $this->render('result'); //??s
            }
        }

        return $this->render('distances', ['models' => $models, 'race' => $request_form->race]);
    }
    public function actionRace(){

        $distances_form = array();
        $request_form = new RequestForm(\Yii::$app->session->get('request_form'));
        $model = new RaceForm([
            'city' => $request_form->city,
            'club_name' => $request_form->club_name
        ]);

        foreach (\Yii::$app->session->get('distances_form') as $distance){
            $distances_form[] = new DistancesForm($distance);
        }

        if(\Yii::$app->request->getIsPost() && $model->load(\Yii::$app->request->post())){

            $this->saveModels($request_form, $distances_form, $model);

            return $this->render('result', []);
        }


        return $this->render('race', ['model' => $model]);
    }
    public function actionTestMail(){
        $this->sendConfirmMessage('UserName', 'sirenko_bogdan@ukr.net');
    }
    /**
     * @param RequestForm $request_form
     * @param DistancesForm[] $distances_form
     * @param RaceForm $race_form
     */
    private function saveModels(&$request_form, &$distances_form, &$race_form = null){

        \Yii::$app->session->remove('request_form');
        \Yii::$app->session->remove('distances_form');

        $request = new Request(ArrayHelper::toArray($request_form));
        $request->send_email = true;
        $request->save();
        foreach ($distances_form as $distance){
            $distance->owner_id = $request->id;
            $distance->save();
        }

        if(!is_null($race_form)){
            $race = new \common\models\Race(ArrayHelper::toArray($race_form));
            $race->owner_id = $request->id;
            $race->save();
        }
    }
    public function actionViewRequest($key){
        $id = 1;
        $request = Request::find()->where(['id' => $id])->one();
        $distances = $request->getDistances()->all();
        $race = $request->getRace()->one();

        return $this->render('view-request', [
            'model' => $request,
            'distances' => $distances,
            'race' => $race
        ]);
    }
    private function sendConfirmMessage($username, $to, $id = null){

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
            'username' => $username,
            'key' => $this->cryptEmail($to)
        ]);

        $mail->setSubject('Підтвердження реестрації на ВППО "МАСТЕРС" 3 та 4 червня 2017 року');
        $mail->setTo($to);
        $mail->setFrom(\Yii::$app->params['adminEmail']);

        $mail->send();
    }

    private function cryptEmail($email){
        $cm = \Yii::$app->security->encryptByKey('123', \Yii::$app->request->cookieValidationKey);
        $cm = bin2hex($cm);

        return $cm;
    }

    private function decryptEmail($string){
        $bin = hex2bin($string);
        $email = \Yii::$app->security->decryptByKey($bin, \Yii::$app->request->cookieValidationKey);

        return $email;
    }
}
