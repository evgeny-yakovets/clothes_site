<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\RubricsBooks */

$this->title = 'Create Rubrics Books';
$this->params['breadcrumbs'][] = ['label' => 'Rubrics Books', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rubrics-books-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
