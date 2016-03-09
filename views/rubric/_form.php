<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Rubric */
/* @var $form yii\widgets\ActiveForm */
?>


<div class="rubric-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?php
    if(isset($model->image) && file_exists(Yii::getAlias('@webroot', $model->image)))
    {
        echo Html::img($model->image, ['class'=>'img-responsive']);
        //echo $form->field($model,'del_img')->checkBox(['class'=>'span-1']);
    }
    ?>
    <?=
    $form->field($model, 'file')->FileInput()
    ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
