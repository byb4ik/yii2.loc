<?php

namespace app\controllers;

use app\models\Messages;
use app\models\Users;
use yii\helpers\ArrayHelper;

class MessagesController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $messages = new Messages();
//        $arr_messages = $messages->find()->all();
//        $result = ArrayHelper::map($arr_messages, 'id', 'user_id');
//        $result = array_unique($result);
//        $users = Users::getUsers($result);

        return $this->render('index', ['model' => $messages->find()->all()]);
    }
}
