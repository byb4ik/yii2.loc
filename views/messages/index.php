<?php
/* @var $this yii\web\View */
?>
    <h1>Сообщения пользователей</h1>

<?php foreach ($model as $message) { ?>

    <ul>
        <li>
            <label>Автор: <?php echo $message->users['mail']; ?></label> <br>
            <?php echo ' ' . $message['message']; ?>
            <hr>
        </li>
    </ul>

<?php } ?>