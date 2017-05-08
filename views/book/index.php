<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

use app\models\Book;
use yii\widgets\ListView;
use yii\data\ActiveDataProvider;

$this->title = 'Книги';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="book-index">

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

    if($visibility) {
        echo "<p>";
                    Html::a('Create Book', ['create'], ['class' => 'btn btn-success']);
        echo "</p>";

        echo GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'id',
                'title',
                'year',
                'description',
                'text_preview:ntext',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]);
    }

    else
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Book::find(),
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
