<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\DetailView;
use app\models\Comment;

/* @var $form yii\widgets\ActiveForm */
/* @var $this yii\web\View */
/* @var $model app\models\Book */
/* @var $files app\models\Files */
/* @var $reviews app\models\Review */
/* @var $comments app\models\Comment */
/* @var $is_favorite bool*/

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Книги', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="book-view">
    <div style="display: inline-block;">
        <div style="float: left;"><h1><?= Html::encode($this->title) ?></h1></div>
        <div style="float: left;vertical-align: bottom;margin-top: 30px;margin-left: 10px;">
        <?php

        if (!Yii::$app->user->isGuest)
        {
            $button_text = '';
            $action_value = '';

            if($is_favorite)
            {
                $button_text = 'Remove from favorites';
                $action_value = 'remove-favorite?id='.$model->id;
            }
            else{
                $button_text = 'Make favorite';
                $action_value = 'add-favorite?id='.$model->id;
            }

            $form = \yii\widgets\ActiveForm::begin([
                'id' => 'add-favorite',
                'action' => $action_value,
                'enableAjaxValidation' => true,
                'validationUrl' => 'validation-rul',
            ]);

            echo Html::submitButton($button_text);

            $form->end();



        }
        ?>
        </div>
    </div>
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

        if($visibility)
        {
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
            'year',
            'description',
            'text_preview:ntext',
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
        if($files != null) {
            echo "<br><br><br>";
            echo Html::Label("Reviews: ");

            foreach ($reviews as $review) {
                echo "<p>$review->title</p>";

                echo "<p>$review->text</p>";
                echo "<p>$review->author, $review->date, from $review->review_link</p> ";
            }
        }
    ?>

    <div class="comment-form">

        <?php

            echo "<br><br><br>";

            $form = ActiveForm::begin();
            $newComment = new Comment();
        ?>

        <?= $form->field($newComment, 'text')->textarea(['rows' => 4, 'cols' => 100]) ?>

        <div class="form-group">
            <?= Html::submitButton('Добавить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

    <?php
    if($comments != null) {
        echo Html::Label("Comments: ");

        foreach ($comments as $comment) {
            echo "<p>$comment->author, $comment->date: </p> ";
            echo "<p>$comment->text</p>";

        }
    }
    ?>


</div>
