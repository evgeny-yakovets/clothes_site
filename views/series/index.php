<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

use app\models\Series;
use yii\widgets\ListView;
use yii\data\ActiveDataProvider;

$this->title = 'Сборники';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="series-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php
    $visibility = false;

    if (Yii::$app->user->isGuest)
    {
        $visibility = !Yii::$app->user->isGuest;
    }
    else
    {
        $visibility = Yii::$app->user->identity['type'] == 'admin' ? true : false;
    }

    if($visibility)
    {
        echo "<p>";
        Html::a('Create Series', ['create'], ['class' => 'btn btn-success']);
        echo "</p>";

        echo GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'id',
                'title',
                'start_year',
                'end_year',
                'book_count',
                // 'description',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]);
    }

    else
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Series::find(),
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);

        echo ListView::widget([
            'dataProvider' => $dataProvider,
            'itemView' => '_list',
        ]);
    }



    ?>


</div>
