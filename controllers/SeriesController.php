<?php

namespace app\controllers;

use Yii;
use app\models\Series;
use app\models\Files;
use app\models\Comment;
use app\models\CommentsSeries;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SeriesController implements the CRUD actions for Series model.
 */
class SeriesController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Series models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Series::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Series model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $cModel = new Comment();
        if ($cModel->load(Yii::$app->request->post()))
        {
            $cModel->author = Yii::$app->user->identity['first_name'];
            $cModel->date = new \yii\db\Expression('NOW()');
            $cModel->save();

            $cbModel = new CommentsSeries();
            $cbModel->series_id = $id;
            $cbModel->comment_id = $cModel->id;
            $cbModel->save();

        }

        return $this->render('view', [
            'model' => $this->findModel($id),
            'files' => $this->findFiles($id),
            'comments' => $this->findComments($id)
        ]);
    }

    /**
     * Creates a new Series model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Series();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Series model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Series model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Series model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Series the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Series::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Finds the Files model based on Series id value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Files the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findFiles($id)
    {
        if (($files = Files::findAll(['series_id' => $id])) !== null) {
            return $files;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Finds the Comments model based on Series id value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Comment the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findComments($id)
    {
        //if (($reviews = Review::find()->innerJoinWith(ReviewsBooks::tableName())->where([ReviewsBooks::tableName().'.book_id' => 1])->all())!== null) {
        $commentsBooks = CommentsSeries::findAll(['series_id' => $id]);
        $comments = [];
        foreach ($commentsBooks as $cb)
        {

            $comments[] = Comment::findOne(['id' => $cb['comment_id']]);
        }

        if ($comments !== null) {
            return $comments;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
