<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Series */
/* @var $files app\models\Files */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Сборники', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="series-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
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
            echo Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']);
            echo Html::a('Delete', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]);
        }
    ?>
    </p>


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'title',
            'book_count',
            'description',
        ],
        'template' => "<p>{value}</p>",
    ]) ?>

    <?php
    if($files !== null) {
        echo Html::Label("Files: ");

        foreach ($files as $file) {
            echo "<br>";
            echo Html::a($file->title, 'download/' . $file->id);
        }
    }
    ?>

    <?php
    if($comments != null) {
        echo "<br><br><br>";
        echo Html::Label("Comments: ");

        foreach ($comments as $comment) {
            echo "<p>$comment->author, $comment->date: </p> ";
            echo "<p>$comment->text</p>";

        }
    }
    ?>

</div>
