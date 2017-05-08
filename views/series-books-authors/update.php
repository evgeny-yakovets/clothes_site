<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SeriesBooksAuthors */

$this->title = 'Update Series Books Authors: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Series Books Authors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="series-books-authors-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
