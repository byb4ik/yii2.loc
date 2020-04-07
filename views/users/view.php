<?php

use yii\widgets\ActiveForm;
use yii\widgets\ActiveField;
use yii\helpers\Html;

?>
<h1>Редактировать данные <?php echo $model['username']; ?></h1>

<ul>
    <li><label>Логин: </label><?php echo $model['username']; ?></li>
    <li><label>Пароль: </label><?php echo $model['password']; ?></li>
    <li><label>Почта: </label><?php echo $model['mail']; ?></li>
</ul>

<?php


$form = ActiveForm::begin([
    'id' => 'login-form',
    'options' => ['class' => 'form-horizontal'],
]) ?>
<ul>
    <?= $form->field($model, 'username') ?>
    <?= $form->field($model, 'password') ?>
    <?= $form->field($model, 'mail') ?>
</ul>
    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>
        </div>
    </div>
    <?php ActiveForm::end() ?>
