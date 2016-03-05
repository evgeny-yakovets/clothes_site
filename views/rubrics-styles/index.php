<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Rubrics Styles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rubrics-styles-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Rubrics Styles', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'rubric_id',
            'style_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
