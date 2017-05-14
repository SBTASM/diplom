<?php
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */
?>

<header class="main-header">

    <?= Html::a('<span class="logo-mini">' . mb_substr(Yii::t('backend', 'Admin console'), 0, 1) . "\n" . '</span><span class="logo-lg">' . Yii::t('backend', 'Admin console') . '</span>', Yii::$app->homeUrl, ['class' => 'logo']) ?>

    <nav class="navbar navbar-static-top" role="navigation">

        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">

                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="hidden-xs"><?= \Yii::$app->user->identity->username ?></span>
                    </a>
                    <ul class="dropdown-menu">

                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="pull-left"><?= Html::a(
                                            Yii::t('backend', 'Sign out'),
                                            ['/site/logout'],
                                            ['data-method' => 'post', 'class' => 'btn btn-primary btn-flat']
                                        ) ?>
                                    </div>
                                    <div class="pull-right">
                                        <?= Html::a(
                                            Yii::t('backend', 'Change password'),
                                            ['user/change-password'],
                                            ['class' => 'btn btn-danger btn-flat']
                                        ) ?>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">

                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
