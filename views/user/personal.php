<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = 'Личный кабинет: ' . ' ' . $model->first_name . ' ' . $model->last_name;
$this->params['breadcrumbs'][] = 'Личный кабинет';
?>
<div class="user-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_personal_form', [
        'model' => $model,
    ]) ?>

</div>
