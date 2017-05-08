<?php

namespace app\controllers;

use Yii;
use app\models\Rubric;
use app\models\Style;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use yii\web\UploadedFile;

/**
 * RubricController implements the CRUD actions for Rubric model.
 */
class RubricController extends Controller
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
     * Lists all Rubric models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Rubric::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Lists all Rubric items.
     * @return mixed
     */
    public function actionItems()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Style::find(),
        ]);

        return $this->render('items', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Rubric model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Rubric model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Rubric();

        if($model->load(Yii::$app->request->post()))
        {
            $file = UploadedFile::getInstance($model, 'file');

            if ($file && $file->tempName) {
                $model->file = $file;

                $material_type = 'rubric(cloth)/';

                if(!file_exists('images/'.$material_type))
                {
                    mkdir('images/'.$material_type, 0777, true);
                }
                $dir = Yii::getAlias('images/'.$material_type);
                $fileName = $model->file->baseName . '.' . $model->file->extension;
                $model->file->saveAs($dir . $fileName);
                $model->file = $fileName;
                $model->image = '/'.$dir . $fileName;
            }
        }

        if ($model->save()) {
            //var_dump($model);
            //die();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Rubric model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if($model->load(Yii::$app->request->post()))
        {
            $file = UploadedFile::getInstance($model, 'file');

            if ($file && $file->tempName) {
                $model->file = $file;

                $material_type = 'rubric(cloth)/';

                if(!file_exists('images/'.$material_type))
                {
                    mkdir('images/'.$material_type, 0777, true);
                }
                $dir = Yii::getAlias('images/'.$material_type);
                $fileName = $model->file->baseName . '.' . $model->file->extension;
                $model->file->saveAs($dir . $fileName);
                $model->file = $fileName;
                $model->image = '/'.$dir . $fileName;
            }
        }

        if ($model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Rubric model.
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
     * Finds the Rubric model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Rubric the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Rubric::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
