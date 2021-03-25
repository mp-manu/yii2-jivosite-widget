<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Главная', 'icon' => 'file-code-o', 'url' => ['/site/index']],
                    ['label' => 'Мой виджет', 'icon' => 'file-code-o', 'url' => ['/site/form'], 'visible' => !Yii::$app->user->isGuest],
                    ['label' => 'Вход', 'url' => ['/site/login'], 'visible' => Yii::$app->user->isGuest],
                    ['label' => 'Выход', 'url' => ['/site/logout'], 'visible' => !Yii::$app->user->isGuest],

                ],
            ]
        ) ?>

    </section>

</aside>
