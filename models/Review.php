<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "db_review".
 *
 * @property integer $id
 * @property string $title
 * @property string $author
 * @property string $date
 * @property string $text
 * @property string $review_link
 */
class Review extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'db_review';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'author', 'date', 'text'], 'required'],
            [['date'], 'safe'],
            [['text'], 'string'],
            [['title', 'author'], 'string', 'max' => 80],
            [['review_link'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'author' => 'Author',
            'date' => 'Date',
            'text' => 'Text',
            'review_link' => 'Review Link',
        ];
    }
}
