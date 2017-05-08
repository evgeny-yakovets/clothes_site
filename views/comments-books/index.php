<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Comments Books';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comments-books-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Comments Books', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'commnet_id',
            'book_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
