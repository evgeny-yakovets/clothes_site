<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "db_comments_series".
 *
 * @property integer $comment_id
 * @property integer $series_id
 *
 * @property DbComment $comment
 */
class CommentsSeries extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'db_comments_series';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['comment_id', 'series_id'], 'required'],
            [['comment_id', 'series_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'comment_id' => 'Comment ID',
            'series_id' => 'Series ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComment()
    {
        return $this->hasOne(DbComment::className(), ['id' => 'comment_id']);
    }
}
