<?php

namespace app\controllers;
use app\models\Users;

class UsersController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionCreate()
    {
        return $this->render('create');
    }

    public function actionView($id)
    {
        $model = Users::findOne($id);
       return $this->render('view', ['model' => $model]);
    }

}
