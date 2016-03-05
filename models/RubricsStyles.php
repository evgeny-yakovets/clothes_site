<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%db_rubrics_styles}}".
 *
 * @property integer $id
 * @property integer $rubric_id
 * @property integer $style_id
 */
class RubricsStyles extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%db_rubrics_styles}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['rubric_id', 'style_id'], 'required'],
            [['rubric_id', 'style_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'rubric_id' => 'Rubric ID',
            'style_id' => 'Style ID',
        ];
    }
}
