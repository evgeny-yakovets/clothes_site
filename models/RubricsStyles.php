<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%db_rubrics_styles}}".
 *
 * @property integer $id
 * @property integer $rubric_id
 * @property integer $style_id
 *
 * @property DbStyle $style
 * @property DbRubric $rubric
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStyle()
    {
        return $this->hasOne(DbStyle::className(), ['id' => 'style_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRubric()
    {
        return $this->hasOne(DbRubric::className(), ['id' => 'rubric_id']);
    }
}
