<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AuthorsBooks */

$this->title = 'Update Authors Books: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Authors Books', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="authors-books-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
