<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Style;
use yii\widgets\ListView;
use yii\data\ActiveDataProvider;

/* @var $this yii\web\View */
/* @var $model app\models\Rubric */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Rubrics', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rubric-view">
<?php
if(!Yii::$app->user->isGuest)
{

}

?>
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php
        if(!Yii::$app->user->isGuest)
        {
        echo Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']);
        echo Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]);
        }?>
    </p>

    <?php
    if(!Yii::$app->user->isGuest)
    {
    echo DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                'title',
                'description',
                'image:image',
            ],
        ]);
    }

    else
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Style::find(),
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);

        echo ListView::widget([
            'dataProvider' => $dataProvider,
            'itemView' => '_list',
        ]);
    }
    ?>

</div>
