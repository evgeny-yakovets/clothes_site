<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\RubricsStyles */

$this->title = 'Create Rubrics Styles';
$this->params['breadcrumbs'][] = ['label' => 'Rubrics Styles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rubrics-styles-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
