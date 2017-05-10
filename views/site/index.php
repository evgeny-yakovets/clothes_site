<?php

/* @var $this yii\web\View */
/* @var $news */
/* @var $books */

use yii\bootstrap\Carousel;

$this->title = '«eBook online»';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Знание - сила!</h1>

        <p class="lead">Добро пожаловать на проект «eBook online».</p>

    </div>

    <div style="overflow:hidden;">
        <div style="width:400px; height:200px; display:inline-block; float:left;">
            <?php
            if(isset($news[0]))
            {
                $content = [];
                foreach ($news as $newsEl) {
                    $content[] = [
                        'content' => '<img src="images/site/carusel/background.jpg" style="height:100%;margin:auto;"/>',
                        'caption' => "<p style='text-decoration-color: #080808'><h4>$newsEl->title</h4><p>$newsEl->preview</p></p>",
                        'options' => [],
                    ];
                }

                echo Carousel::widget([
                    'items' => $content,
                    'options' => [
                        'style' => 'height:200px;'
                    ]
                ]);
            }
            ?>
        </div>
        <div style="width:400px; height:200px; display:inline-block; float:right;">
            <?php
            if(isset($books[0]))
            {
                $content = [];
                foreach ($books as $book) {
                    $content[] = [
                        'content' => '<img src="images/site/carusel/background.jpg" style="height:100%;margin:auto;"/>',
                        'caption' => "<h4>$book->title</h4><p>$book->year</p>",
                        'options' => [],
                    ];
                }

                echo Carousel::widget([
                    'items' => $content,
                    'options' => [
                        'style' => 'height:200px;'
                    ]
                ]);
            }
            ?>
        </div>
    </div>


    </div>
</div>
