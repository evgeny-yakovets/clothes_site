<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 3/5/16
 * Time: 12:30 PM
 */

use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\helpers\Url;


?>

<div class="news-item" style="overflow:hidden;">

    <div>
        <h2><a href="<?php echo Yii::$app->urlManager->createUrl(['style/index', 'id' => $model->id]) ?>"><?php echo Html::encode($model->title) ?></a></h2>
    </div>

    <div style="float:left;"><?php if($model->image != null){echo HtmlPurifier::process(Html::img($model->image,['width' => '100px']));} ?></div>

    <div style="float:left;margin-left:10px;"><?= HtmlPurifier::process(Html::encode($model->description)) ?></div>

</div>