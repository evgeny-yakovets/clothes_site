<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "db_rubrics_books".
 *
 * @property integer $id
 * @property integer $book_id
 * @property integer $rubric_id
 */
class RubricsBooks extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'db_rubrics_books';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['book_id', 'rubric_id'], 'required'],
            [['book_id', 'rubric_id'], 'integer']
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
            'rubric_id' => 'Rubric ID',
        ];
    }
}
