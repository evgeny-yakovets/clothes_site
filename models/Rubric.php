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
 */
class Rubric extends \yii\db\ActiveRecord
{
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
            [['description'], 'string', 'max' => 255],
            [['image'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, pdf']
            //[['file'], 'file', 'extensions' => 'png, jpg'],
            //[['del_img'], 'boolean'],
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

    public function upload()
    {
        if ($this->validate()) {
            $this->image->saveAs('uploads/' . $this->image->baseName . '.' . $this->image->extension);
            return true;
        } else {
            return false;
        }
    }
}
