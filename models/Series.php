<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "db_series".
 *
 * @property integer $id
 * @property string $title
 * @property integer $start_year
 * @property integer $end_year
 * @property integer $book_count
 * @property string $description
 */
class Series extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'db_series';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'description'], 'required'],
            [['start_year', 'end_year', 'book_count'], 'integer'],
            [['title'], 'string', 'max' => 40],
            [['description'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Название',
            'start_year' => 'Первая книга',
            'end_year' => 'Последняя книга',
            'book_count' => 'Количество книг',
            'description' => 'Описание',
        ];
    }
}
