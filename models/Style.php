<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%db_style}}".
 *
 * @property integer $id
 * @property string $title
 * @property string $image
 * @property string $description
 *
 * @property RubricsStyles[] $rubricsStyles
 */
class Style extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%db_style}}';
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
            'title' => 'Title',
            'image' => 'Image',
            'description' => 'Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRubricsStyles()
    {
        return $this->hasMany(RubricsStyles::className(), ['style_id' => 'id']);
    }
}
