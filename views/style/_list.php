<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 3/9/16
 * Time: 11:06 AM
 */

use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\helpers\Url;


?>


<div class="news-item" style="overflow:hidden;">

    <div>
        <h2><a href="<?php echo Yii::$app->urlManager->createUrl(['style/view', 'id' => $model->id]) ?>"><?php echo Html::encode($model->title) ?></a></h2>
    </div>

    <div style="float:left;"><?= HtmlPurifier::process(Html::img($model->image,['width' => '100px'])) ?></div>

    <div style="float:left;margin-left:10px;"><?= HtmlPurifier::process(Html::encode($model->description)) ?></div>

</div>