<?php

namespace app\models;

use Yii;
use app\models\Messages;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string $mail
 * @property int|null $access
 */
class Users extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'password', 'mail'], 'required'],
            [['access'], 'integer'],
            [['username'], 'string', 'max' => 20],
            [['password'], 'string', 'max' => 255],
            [['mail'], 'string', 'max' => 30],
            [['username'], 'unique'],
            [['mail'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Логин',
            'password' => 'Пароль',
            'mail' => 'Почта',
            'access' => 'Access',
        ];
    }

    public static function getUserById($id)
    {
        return Users::find()->where(['id' => $id])->one();
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        $user = Users::find()->where(['username' => $username])->one();

        if (strcasecmp($user['username'], $username) === 0) {
            return new static($user);
        }

        return null;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->getSecurity()->validatePassword($password, $this->password);
    }

//    public static function getUsers(array $ids = [])
//    {
//        return Users::findAll($ids);
//    }

    public function getMessages()
    {
        return $this->hasMany(Messages::class, ['user_id' => 'id']);
    }

    /**
     * @inheritDoc
     */
    public static function findIdentity($id)
    {
        // TODO: Implement findIdentity() method.
    }

    /**
     * @inheritDoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        // TODO: Implement findIdentityByAccessToken() method.
    }

    /**
     * @inheritDoc
     */
    public function getId()
    {
        // TODO: Implement getId() method.
    }

    /**
     * @inheritDoc
     */
    public function getAuthKey()
    {
        // TODO: Implement getAuthKey() method.
    }

    /**
     * @inheritDoc
     */
    public function validateAuthKey($authKey)
    {
        // TODO: Implement validateAuthKey() method.
    }
}
