<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\CommentsSeries */

$this->title = $model->comment_id;
$this->params['breadcrumbs'][] = ['label' => 'Comments Series', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comments-series-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->comment_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->comment_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'comment_id',
            'series_id',
        ],
    ]) ?>

</div>
