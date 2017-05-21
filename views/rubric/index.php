<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

use app\models\Rubric;
use yii\widgets\ListView;
use yii\data\ActiveDataProvider;
use yii\widgets\ActiveForm;

$this->title = 'Жанры';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rubric-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <div style="display: inline-block;width: 100%;">

        <div class="search-book-form" >
            <?php
            $form = ActiveForm::begin();
            $form->enableClientValidation = false;
            $searchRubric = new Rubric();
            ?>
            <div style="float:left;">
                <?= $form->field($searchRubric, 'title')->textInput(['style' => 'width:200px;'])->label('Название') ?>
            </div>

            <div class="form-group" style="float:left;margin-left:10px;margin-top:24px;">
                <?= Html::submitButton('Поиск', ['class' => 'btn btn-success']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
        <div style="float:left;margin-left:10px;margin-top:0px;">
            <div>
                <b>Сортировать: </b>
            </div>
            <div style="float:left;margin-left:-40px;margin-top:0px;">

                <?php

                echo ListView::widget([
                    'dataProvider' => $dataProvider,
                    'layout' => '{sorter}',
                ]);

                ?>
            </div>
        </div>

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
        Html::a('Добавить жанр', ['create'], ['class' => 'btn btn-success']);
        echo "</p>";
        echo GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'id',
                'title',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]);
    }
    else
    {


        echo ListView::widget([
            'dataProvider' => $dataProvider,
            'itemOptions' => ['class' => 'item'],
            'itemView' => '_list'
        ]);
    }



    ?>

</div>
