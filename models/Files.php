<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "db_files".
 *
 * @property integer $id
 * @property string $type
 * @property string $title
 * @property integer $book_id
 * @property integer $series_id
 * @property string $url
 */
class Files extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'db_files';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'title', 'url'], 'required'],
            [['book_id', 'series_id'], 'integer'],
            [['url'], 'string'],
            [['type'], 'string', 'max' => 20],
            [['title'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Type',
            'title' => 'Title',
            'book_id' => 'Book ID',
            'series_id' => 'Series ID',
            'url' => 'Url',
        ];
    }
}
