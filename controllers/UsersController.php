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
            $user->save();

            return $this->redirect('/users');
        }

        return $this->render('create', ['model' => $user]);
    }

    public function actionView($id = null)
    {
        $user = Users::getUserById($id);
        if ($user->load(Yii::$app->request->post()) && $user->validate()) {
            $user->save();
        }

        return $this->render('view', ['model' => $user]);
    }

    public function actionDelete($id)
    {
        $user = Users::findOne($id);
        $user->delete();

        return $this->redirect('/users');
    }
}
