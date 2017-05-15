<?php

namespace app\controllers;

use app\models\CommentsSeries;
use app\models\Files;
use Faker\Provider\DateTime;
use Yii;
use app\models\Book;
use app\models\Comment;
use app\models\CommentsBooks;
use app\models\Review;
use app\models\ReviewsBooks;
use app\models\Favorites;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BookController implements the CRUD actions for Book model.
 */
class BookController extends Controller
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
     * Lists all Book models.
     * @return mixed
     */
    public function actionIndex()
    {

        $dataProvider = new ActiveDataProvider([
            'query' => Book::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Book model.
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

            $cbModel = new CommentsBooks();
            $cbModel->book_id = $id;
            $cbModel->commnet_id = $cModel->id;
            $cbModel->save();

        }

        return $this->render('view', [
            'model' => $this->findModel($id),
            'files' => $this->findFiles($id),
            'reviews' => $this->findReviews($id),
            'comments' => $this->findComments($id),
            'is_favorite' => $this->isFavorite($id)
        ]);
    }

    /**
     * Creates a new Book model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Book();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Book model.
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
     * Deletes an existing Book model.
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
     * Finds the Book model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Book the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Book::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Finds the Files model based on Book id value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Files the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findFiles($id)
    {
        if (($files = Files::findAll(['book_id' => $id])) !== null) {
            return $files;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Finds the Files model based on File id value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Files the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDownload($id)
    {
        $file = Files::findOne(['id' => $id]);
        if ($file !== null) {
            return Yii::$app->response->sendFile(Yii::getAlias('@webroot/uploads/books/' . $file->id . '/' . $file->url));
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Finds the Reviews model based on Book id value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Files the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findReviews($id)
    {
        //if (($reviews = Review::find()->innerJoinWith(ReviewsBooks::tableName())->where([ReviewsBooks::tableName().'.book_id' => 1])->all())!== null) {
        $reviewsBooks = ReviewsBooks::findAll(['book_id' => $id]);
        $reviews = [];
        foreach ($reviewsBooks as $rb)
        {
            $reviews[] = Review::findOne(['id' => $rb['review_id']]);
        }

        if ($reviews !== null) {
            return $reviews;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Finds the Comments model based on Book id value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Files the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findComments($id)
    {
        //if (($reviews = Review::find()->innerJoinWith(ReviewsBooks::tableName())->where([ReviewsBooks::tableName().'.book_id' => 1])->all())!== null) {
        $commentsBooks = CommentsBooks::findAll(['book_id' => $id]);
        $comments = [];
        foreach ($commentsBooks as $cb)
        {

            $comments[] = Comment::findOne(['id' => $cb['commnet_id']]);
        }

        if ($comments !== null) {
            return $comments;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Finds the Files model based on Book id value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Files the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionAddFavorite($id)
    {
        if(!Yii::$app->user->isGuest){
            if(!$isFavorite = Favorites::findOne(['book_id' => $id, 'user_id' => Yii::$app->user->identity['id']]))
            {
                Favorites::addFavorite(Yii::$app->user->identity['id'], $id);
            };

            return $this->redirect('view?id='.$id);
        }
    }

    /**
     * Finds the Files model based on Book id value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Files the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionRemoveFavorite($id)
    {
        if(!Yii::$app->user->isGuest){
            if(Favorites::findOne(['book_id' => $id, 'user_id' => Yii::$app->user->identity['id']]))
            {
                Favorites::removeFavorite(Yii::$app->user->identity['id'], $id);
            };

            return $this->redirect('view?id='.$id);
        }
    }

    /**
     * @param $id
     * @return bool
     */
    private function isFavorite($id){
        if (Favorites::findOne(['user_id' => Yii::$app->user->identity['id'], 'book_id' => $id])){
            return true;
        }
        else{
            return false;
        }
    }
}
