<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;

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
    public $file;
    public $del_img;


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
            [['image', 'description'], 'string', 'max' => 255],
            [['file'], 'file', 'extensions' => 'png, jpg, pdf'],
            [['del_img'], 'boolean']
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
        return $this->hasMany(RubricsStyles::className(), ['style_id' => 'id']);
    }
}
