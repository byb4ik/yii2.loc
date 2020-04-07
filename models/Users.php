<?php

namespace app\models;

use Yii;
use app\models\Messages;
/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string $mail
 * @property int|null $access
 */
class Users extends \yii\db\ActiveRecord
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
            [['password'], 'string', 'max' => 50],
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

//    public static function getUsers(array $ids = [])
//    {
//        return Users::findAll($ids);
//    }

    public function getMessages()
    {
        return $this->hasMany(Messages::class, ['user_id' => 'id']);
    }
}
