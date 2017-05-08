<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "db_comments_books".
 *
 * @property integer $commnet_id
 * @property integer $book_id
 *
 * @property DbComment $commnet
 */
class CommentsBooks extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'db_comments_books';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['commnet_id', 'book_id'], 'required'],
            [['commnet_id', 'book_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'commnet_id' => 'Commnet ID',
            'book_id' => 'Book ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCommnet()
    {
        return $this->hasOne(DbComment::className(), ['id' => 'commnet_id']);
    }
}
