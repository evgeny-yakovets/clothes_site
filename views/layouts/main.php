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
        'brandLabel' => 'Модный сайт',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
/*    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Rubric', 'url' => ['/rubric/index']],
            ['label' => 'About', 'url' => ['/site/about']],
            ['label' => 'Contact', 'url' => ['/site/contact']],

        ],
    ]);*/
    NavBar::end();
    ?>


    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>

        <div class="menu" style="width:17%;float:left;">

            <?php

            $verticalMenu = [
                ['label' => 'Разделы', 'url' => ['/rubric/index']],
                ['label' => 'Работы', 'url' => ['/style/index'], 'visible'=>!Yii::$app->user->isGuest],
                ['label' => 'О нас', 'url' => ['/site/about']],
                ['label' => 'Контакты', 'url' => ['/site/contact']],
                ['label' => 'Выйти', 'url'=> ['/site/logout'], 'linkOptions' => ['data-method' => 'post'], 'visible'=>!Yii::$app->user->isGuest]
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
        <p class="pull-left">&copy; Модный сайт <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
