<aside class="main-sidebar">

    <section class="sidebar">

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    ['label' => Yii::t('backend', 'Requests'), 'icon' => 'rss', 'url' => ['/request'], 'items' => [
                        ['label' => Yii::t('backend' , 'Create'), 'icon' => 'plus', 'url' => ['/request/create']],
                        ['label' => Yii::t('backend' , 'Distances'), 'icon' => 'bicycle', 'url' => ['/distance']],
                        ['label' => Yii::t('backend' , 'Race'), 'icon' => 'fighter-jet', 'url' => ['/race']],
                        ['label' => Yii::t('backend' , 'Relays'), 'icon' => 'sort-alpha-asc', 'url' => ['/stucking']],
                        ['label' => Yii::t('backend' , 'List'), 'icon' => 'list', 'url' => ['/request']],
                    ]],
                    ['label' => Yii::t('backend' , 'Age groups'), 'icon' => 'bars', 'items' => [
                        ['label' => Yii::t('backend' , 'Age group from request'), 'icon' => 'rss', 'url' => ['/request/create']],
                        ['label' => Yii::t('backend' , 'Age group from race'), 'icon' => 'fighter-jet', 'url' => ['/request/create']]
                    ]],
                    ['label' => Yii::t('backend' , 'Users'), 'icon' => 'users', 'url' => ['/stucking']],
                    ['label' => Yii::t('backend' , 'Settings'), 'icon' => 'gears', 'url' => ['/settings']],
                ],
            ]
        ) ?>
    </section>
</aside>
