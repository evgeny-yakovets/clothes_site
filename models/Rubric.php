<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%db_rubric}}".
 *
 * @property integer $id
 * @property string $title
 * @property string $image
 * @property string $description
 *
 * @property RubricsStyles[] $rubricsStyles
 */
class Rubric extends \yii\db\ActiveRecord
{
    public $file;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%db_rubric}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'image', 'description'], 'required'],
            [['title'], 'string', 'max' => 20],
            [['image', 'description'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Заголовок',
            'image' => 'Изображение',
            'description' => 'Описание',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRubricsStyles()
    {
        return $this->hasMany(RubricsStyles::className(), ['rubric_id' => 'id']);
    }
}
