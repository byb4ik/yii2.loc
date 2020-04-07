<?php

namespace app\models;

use Yii;
use app\models\Users;

/**
 * This is the model class for table "messages".
 *
 * @property int $id
 * @property int $user_id
 * @property string $message
 */
class Messages extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'messages';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'message'], 'required'],
            [['user_id'], 'integer'],
            [['message'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'message' => 'Message',
        ];
    }

    public static function getMessagesById($id)
    {
        return Messages::find()->where(['id' => $id])->one();
    }

    public function getUsers()
    {
        return $this->hasOne(Users::class, ['id' => 'user_id']);
    }
}
