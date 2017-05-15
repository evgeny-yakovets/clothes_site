<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "db_comment".
 *
 * @property integer $id
 * @property string $author
 * @property string $date
 * @property string $text
 *
 * @property DbCommentsBooks $dbCommentsBooks
 * @property DbCommentsSeries $dbCommentsSeries
 */
class Comment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'db_comment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['author', 'date', 'text'], 'required'],
            [['date'], 'safe'],
            [['text'], 'string'],
            [['author'], 'string', 'max' => 40]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'author' => 'Author',
            'date' => 'Date',
            'text' => 'Комментарий',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDbCommentsBooks()
    {
        return $this->hasOne(DbCommentsBooks::className(), ['commnet_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDbCommentsSeries()
    {
        return $this->hasOne(DbCommentsSeries::className(), ['comment_id' => 'id']);
    }
}
