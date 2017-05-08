<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CommentsSeries */

$this->title = 'Update Comments Series: ' . ' ' . $model->comment_id;
$this->params['breadcrumbs'][] = ['label' => 'Comments Series', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->comment_id, 'url' => ['view', 'id' => $model->comment_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="comments-series-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
