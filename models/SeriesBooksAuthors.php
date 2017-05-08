<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "db_series_books_authors".
 *
 * @property integer $id
 * @property integer $series_id
 * @property integer $book_id
 * @property integer $author_id
 */
class SeriesBooksAuthors extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'db_series_books_authors';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['series_id', 'author_id'], 'required'],
            [['series_id', 'book_id', 'author_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'series_id' => 'Series ID',
            'book_id' => 'Book ID',
            'author_id' => 'Author ID',
        ];
    }
}
