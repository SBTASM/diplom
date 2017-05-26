<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $user common\models\User */
/* @var $dates array */
/* @var $numbers array */

?>

<center>
    <h3><?= Yii::t('mail', 'Dear {username}, thank you for the registration of.', ['username' => $username]) ?></h3>
</center>
<p><?= Html::tag('p', Yii::t('mail', 'Remember that you need to pass the credentials committee before the competition.')) ?><br />
<?= Yii::t('mail', 'Commission to present you:') ?></p>
<?= Html::ol([
    Yii::t('mail', 'A copy of the passport (1-4 pages, registration of).'),
    Yii::t('mail', 'Receipt of voluntary risk.'),
    Yii::t('mail', 'Entry fee 150 UAH.'),
    Yii::t('mail', 'If you are taking part in the swimming relay, the representative of your team must present "a card\'s relay swimming."'),
    Yii::t('mail', 'Checks claimed your distance.'),
]) ?>
<?= Html::tag('strong', Html::tag('p',  Yii::t('mail', 'Blank "voluntary acknowledgment of risk" and "a card\'s relay swimming" in Annex hereto.'))) ?>

<?php foreach ($dates as $header => $date){
    echo Html::tag('strong', $header);
    echo Html::ul($date);
} ?>

<?= Html::tag('strong', Html::tag('p', Yii::t('mail', 'For more information please call:'))) ?>

<?= Html::ul($numbers, ['item' => function($item, $index){
    return Html::tag('li', $index . ' ' . Html::tag('strong', $item));
}]) ?>

<center>
    <?= Html::tag('strong',  Yii::t('mail', 'Address: {address}.', ['address' => $address])) ?><br/>
    <?= Html::tag('strong',  Yii::t('mail', 'Email: {email}.', ['email' => $email])) ?><br/>
    <?= Html::tag('strong',  Yii::t('mail', 'Sincerely, Organizing Committee of the competition {email}.', ['email' => $email])) ?><br/>
</center>