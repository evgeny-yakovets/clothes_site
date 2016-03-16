<?php

use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\widgets\DetailView;
use yii\bootstrap\Carousel;

/* @var $this yii\web\View */
/* @var $model app\models\Style */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Styles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="style-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php
        if(!Yii::$app->user->isGuest)
        {
        echo Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']);
        echo Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]);}
        ?>
    </p>

    <?php
    if($model->image != null)
    {
        $content = '<img src="'.$model->image.'" style="height:500px;margin:auto;"/>';
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
                'style' => 'height:500px;text-align:center;'
            ]
        ]);
    }
?>
    <div style="float:left;margin-top:30px;"><?= HtmlPurifier::process(Html::encode($model->description)) ?></div>
</div>
