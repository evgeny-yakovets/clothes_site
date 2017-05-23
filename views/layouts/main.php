<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => '«eBook online»',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],

    ]);
    $menuItems = [];
    if (Yii::$app->user->isGuest)
    {
        $menuItems = [
            ['label' => 'Регистрация', 'url' => ['/user/registration']],
            ['label' => 'Авторизация', 'url' => ['/site/login']],
        ];
    }
    else
    {
        $menuItems = [
            ['label' => Yii::$app->user->identity['first_name'], 'url' => ['/user/personal?id='.Yii::$app->user->identity['id']]],
            ['label' => 'Выход', 'url' => ['/logout-user']],
        ];
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();

    ?>



    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>

        <div class="menu" style="width:17%;float:left;">

            <?php
            $visibility = false;
            if (Yii::$app->user->isGuest)
            {
                $visibility = !Yii::$app->user->isGuest;
            }
            else
            {
                $visibility = Yii::$app->user->identity['type'] == 'admin' ? true : false;
            }

            $verticalMenu = [
                ['label' => 'Авторы', 'url' => ['/author/index']],
                //['label' => 'Авторы и книги', 'url' => ['/authors-books/index'], 'visible'=>$visibility],
                ['label' => 'Любимые книги', 'url' => ['/book/favorite'], 'visible'=> !Yii::$app->user->isGuest],
                ['label' => 'Книги', 'url' => ['/book/index']],
                ['label' => 'Комментарии', 'url' => ['/comment/index'], 'visible'=>$visibility],
                //['label' => 'Комментарии и книги', 'url' => ['/comments-books/index'], 'visible'=>$visibility],
                //['label' => 'Комментарии и сборники', 'url' => ['/comments-series/index'], 'visible'=>$visibility],
                ['label' => 'Избранные', 'url' => ['/favorites/index'], 'visible'=>$visibility],
                ['label' => 'Файлы', 'url' => ['/files/index'], 'visible'=>$visibility],
                ['label' => 'Рецензии', 'url' => ['/review/index'], 'visible'=>$visibility],
                //['label' => 'Рецензии и книги', 'url' => ['/reviews-books/index'], 'visible'=>$visibility],
                ['label' => 'Жанры', 'url' => ['/rubric/index'], 'visible'=> !Yii::$app->user->isGuest],
                //['label' => 'Рубрики и книги', 'url' => ['/rubrics-books/index'], 'visible'=>$visibility],
                ['label' => 'Сборники', 'url' => ['/series/index']],
                //['label' => 'Сборники и книги и авторы', 'url' => ['/series-books-authors/index'], 'visible'=>$visibility],
                ['label' => 'Новости', 'url' => ['/news/index']],
                ['label' => 'Работы', 'url' => ['/style/index'], 'visible'=>$visibility],
                ['label' => 'О нас', 'url' => ['/site/about']],
                ['label' => 'Контакты', 'url' => ['/site/contact']],
                ['label' => 'Выйти', 'url'=> ['/site/logout'], 'linkOptions' => ['data-method' => 'post'], 'visible'=>$visibility]
            ];

            echo Nav::widget([
                'options' => ['class' => 'nav nav-pils nav-stacked'],
                'items' => $verticalMenu,
            ]);

            ?>

        </div>

        <div class="content" style="width:80%;float:left;margin:0 0 0 3%">

            <?= $content ?>

        </div>

    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; «eBook online» <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
