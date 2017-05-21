<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "db_news".
 *
 * @property integer $id
 * @property string $title
 * @property string $preview
 * @property string $text
 * @property string $date
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'db_news';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'preview', 'text', 'date'], 'required'],
            [['date'], 'safe'],
            [['title', 'preview'], 'string', 'max' => 128],
            [['text'], 'string', 'max' => 255]
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
            'preview' => 'Превью',
            'text' => 'Текст',
            'date' => 'Дата',
        ];
    }
}
