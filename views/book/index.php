<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $condition  */

use app\models\Book;
use yii\widgets\ListView;
use yii\data\ActiveDataProvider;
use yii\widgets\ActiveForm;

$this->title = 'Книги';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="book-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="search-book-form" style="display: inline-block;">
        <?php
            $form = ActiveForm::begin();
            $form->enableClientValidation = false;
            $searchBook = new Book();
        ?>
        <div style="float:left;">
            <?= $form->field($searchBook, 'title')->textInput(['style' => 'width:200px;'])->label('Название') ?>
        </div>
        <div style="float:left;margin-left:10px;">
            <?= $form->field($searchBook, 'year')->textInput(['style' => 'width:200px;'])->label('Год') ?>
        </div>

        <div class="form-group" style="float:left;margin-left:10px;margin-top:24px;">
            <?= Html::submitButton('Поиск', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>

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
            'query' => Book::find()->where($condition),
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
