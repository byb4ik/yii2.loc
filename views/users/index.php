<?php

use yii\helpers\Url;
use \yii\helpers\Html;

?>
    <h3>Зарегистрированные Пользователи</h3>

<?= Html::a('Добавить нового', ['users/create'], ['class' => 'profile-link']) ?>

<?php foreach ($model as $user) { ?>
    <ul>
        <li>
            <label><a href="<?php echo Url::toRoute(['users/view', 'id' => $user['id']]); ?>">ID:</a></label><?php echo $user['id']; ?>
            <?= Html::a('Удалить', ['users/delete', 'id' => $user['id']], ['class' => 'profile-link']) ?>
        </li>
        <li>
            <label>Логин: </label><?php echo $user['username']; ?>
        </li>
        <li>
            <label>Пароль: </label><?php echo $user['password']; ?>
        </li>
        <li>
            <label>Почта: </label><?php echo $user['mail']; ?>
        </li>
    </ul>
<?php } ?>