<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CommentsSeries */

$this->title = 'Create Comments Series';
$this->params['breadcrumbs'][] = ['label' => 'Comments Series', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comments-series-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
