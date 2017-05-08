<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CommentsBooks */

$this->title = 'Update Comments Books: ' . ' ' . $model->commnet_id;
$this->params['breadcrumbs'][] = ['label' => 'Comments Books', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->commnet_id, 'url' => ['view', 'id' => $model->commnet_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="comments-books-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
