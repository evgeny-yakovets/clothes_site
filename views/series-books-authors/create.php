<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SeriesBooksAuthors */

$this->title = 'Create Series Books Authors';
$this->params['breadcrumbs'][] = ['label' => 'Series Books Authors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="series-books-authors-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
