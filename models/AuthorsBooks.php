<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "db_authors_books".
 *
 * @property integer $id
 * @property integer $book_id
 * @property integer $author_id
 */
class AuthorsBooks extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'db_authors_books';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['book_id', 'author_id'], 'required'],
            [['book_id', 'author_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'book_id' => 'Book ID',
            'author_id' => 'Author ID',
        ];
    }
}
