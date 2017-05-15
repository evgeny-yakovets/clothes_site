<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "db_user".
 *
 * @property integer $id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $password
 * @property string $type
 * @property string $auth_key
 * @property string $access_token
 */
//class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    public $uid;
    public $username;
    public $pass;
    public $authKey;
    public $accessToken;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'db_user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'email', 'password', 'type', 'auth_key', 'access_token'], 'required'],
            [['first_name', 'last_name'], 'string', 'max' => 40],
            [['email'], 'string', 'max' => 70],
            [['password'], 'string', 'max' => 36],
            [['type'], 'string', 'max' => 5],
            [['auth_key', 'access_token'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'email' => 'Email',
            'password' => 'Password',
            'type' => 'Type',
            'auth_key' => 'Auth Key',
            'access_token' => 'Access Token',
        ];
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        if ($user = self::findOne(['id' => $id]))
            return isset($user) ? new static($user) : null;
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        if ($user = self::findOne(['access_token' => $token]))
                return new static($user);

        return null;
    }

    /**
     * Finds user by username
     *
     * @param  string      $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        if ($user = self::getFullUserInfo(self::findOne(['email' => $username])))
        {
            return new static($user);
        }

        return null;
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->uid;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param  string  $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->pass === $password;
    }

    private function getFullUserInfo($sqlUser)
    {
        $user['uid'] = $sqlUser['id'];
        $user['username'] = $sqlUser['email'];
        $user['pass'] = $sqlUser['password'];
        $user['authKey'] = $sqlUser['auth_key'];
        $user['accessToken'] = $sqlUser['access_token'];

        return $user;
    }

    /**
     * Logs in a user using the provided username and password.
     * @return boolean whether the user is logged in successfully
     */
    public function login($login, $password)
    {

        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser($login, $password));
        }
        return false;
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    public function getUser($login, $password)
    {
        $user = User::findByUsername($login);

        return $user;
    }
}
