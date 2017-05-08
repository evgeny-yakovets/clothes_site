<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CommentsBooks */

$this->title = 'Create Comments Books';
$this->params['breadcrumbs'][] = ['label' => 'Comments Books', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comments-books-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
