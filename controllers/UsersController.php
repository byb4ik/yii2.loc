<?php

namespace app\controllers;

use Yii;
use app\models\Users;
use yii\rest\IndexAction;

class UsersController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $users = new Users();
        return $this->render('index', ['model' => $users->find()->all()]);
    }

    public function actionCreate()
    {
        $user = new Users();
        if ($user->load(Yii::$app->request->post()) && $user->validate()) {
            if ($user->save()) {
                $id = Yii::$app->db->getLastInsertID();
                Yii::$app->session->setFlash('success', 'Пользователь добавлен!');
                return $this->redirect('/users/view?id=' . $id);
            }
        }

        return $this->render('create', ['model' => $user]);
    }

    public function actionView($id = null)
    {
        $user = Users::getUserById($id);
        if ($user->load(Yii::$app->request->post()) && $user->validate()) {
            if ($user->save()) {
                Yii::$app->session->setFlash('success', 'Запись обновлена!');
            }
        }

        return $this->render('view', ['model' => $user]);
    }


    public
    function actionDelete($id)
    {
        $user = Users::findOne($id);
        if ($user->delete()){
            Yii::$app->session->setFlash('error', 'Пользователь удален!');
            return $this->redirect('/users');
        }
    }
}
