<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

use app\models\Rubric;
use app\models\Style;
use yii\widgets\ListView;
use yii\data\ActiveDataProvider;

$this->title = 'Rubrics';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rubric-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php
        if(!Yii::$app->user->isGuest)
        {
            echo Html::a('Create Rubric', ['create'], ['class' => 'btn btn-success']);
        }

        ?>
    </p>

    <?php

    if(!Yii::$app->user->isGuest) {
        echo GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'id',
                'title',
                'image',
                'description',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]);
    }

    else
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Style::find(),
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
