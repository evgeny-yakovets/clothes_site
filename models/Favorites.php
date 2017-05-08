<?php

namespace app\models;

use Yii;
use Yii\db\mysql\QueryBuilder;
/**
 * This is the model class for table "db_favorites".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $book_id
 */
class Favorites extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'db_favorites';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'book_id'], 'required'],
            [['user_id', 'book_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'book_id' => 'Book ID',
        ];
    }

    /**
     * @param $user_id
     * @param $book_id
     */
    static public function addFavorite($user_id, $book_id){
        Yii::$app->db->createCommand("insert into db_favorites values(null,$user_id, $book_id)")->execute();
    }

    /**
     * @param $user_id
     * @param $book_id
     */
    static public function removeFavorite($user_id, $book_id){
        Yii::$app->db->createCommand('delete from db_favorites where user_id = "'.$user_id.'" and book_id = "'.$book_id.'"')->execute();
    }
}
