<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "db_author".
 *
 * @property integer $id
 * @property string $name
 * @property integer $born
 * @property integer $death
 * @property string $description
 */
class Author extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'db_author';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['born', 'death'], 'integer'],
            [['description'], 'string'],
            [['name'], 'string', 'max' => 80]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя',
            'born' => 'Родился',
            'death' => 'Умер',
            'description' => 'Описание',
        ];
    }
}
