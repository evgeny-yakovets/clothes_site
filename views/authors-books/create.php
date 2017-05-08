<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\AuthorsBooks */

$this->title = 'Create Authors Books';
$this->params['breadcrumbs'][] = ['label' => 'Authors Books', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="authors-books-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
