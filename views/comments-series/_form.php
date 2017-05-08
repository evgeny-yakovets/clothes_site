<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CommentsSeries */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="comments-series-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'comment_id')->textInput() ?>

    <?= $form->field($model, 'series_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
