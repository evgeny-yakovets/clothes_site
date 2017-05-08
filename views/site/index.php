<?php

/* @var $this yii\web\View */
/* @var $news */

use yii\bootstrap\Carousel;

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Fashion is my profession!</h1>

        <p class="lead">Добро пожаловать на проект «eBook online».</p>

    </div>

    <?php
    if($news[0] != null)
    {
        $content = '<img src="'.$news[0]->title.'" style="height:500px;margin:auto;"/>';
        echo Carousel::widget([
            'items' => [
                ['content' => $content],
                // the item contains both the image and the caption
                /*            [
                                'content' => $content,
                                'caption' => '<h4>This is title</h4><p>This is the caption text</p>',
                                'options' => ['width' => '80px'],
                        ],*/

            ],
            'options' => [
                'style' => 'height:500px;'
            ]
        ]);
    }
    ?>

    </div>
</div>
