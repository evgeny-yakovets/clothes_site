<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 3/5/16
 * Time: 12:30 PM
 */

    use yii\helpers\Html;
    use yii\helpers\HtmlPurifier;
    ?>

<div class="news-item">
    <h2><?= Html::a(Html::encode($model->title), 'view?id='.$model->id) ?></h2></a>
    <?= HtmlPurifier::process($model->description) ?>
</div>