<?php

use yii\widgets\ActiveForm;
use yii\widgets\ActiveField;
use yii\helpers\Html;

?>
<h3>Добавить нового пользователя</h3>
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

