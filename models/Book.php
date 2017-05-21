<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "db_book".
 *
 * @property integer $id
 * @property string $title
 * @property integer $year
 * @property string $description
 * @property string $text_preview
 */
class Book extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'db_book';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'description'], 'required'],
            [['year'], 'integer'],
            [['text_preview'], 'string'],
            [['title'], 'string', 'max' => 70],
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
            'year' => 'Год',
            'description' => 'Описание',
            'text_preview' => 'Превью',
        ];
    }
}
