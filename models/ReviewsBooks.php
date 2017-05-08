<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "db_reviews_books".
 *
 * @property integer $id
 * @property integer $review_id
 * @property integer $book_id
 */
class ReviewsBooks extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'db_reviews_books';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['review_id', 'book_id'], 'required'],
            [['review_id', 'book_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'review_id' => 'Review ID',
            'book_id' => 'Book ID',
        ];
    }
}
