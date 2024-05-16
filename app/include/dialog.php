<?php
$mes = getDialogueMessages($_SESSION['id'], $_GET['id']);
$username = selectTable('users', ['id_users' => $_GET['id']], 1);
?>
<div class="row post">
    <a href="#"><?=$username[0]['username']?></a>
    <!-- Сюда можно было бы аватарку собеседника -->
</div>
<div class="post row">
    <form action="dialogue.php" method="post">
        <div class="mb-3">
            <label for="content" class="form-label"></label>
            <textarea name="text" class="form-control" id="content" rows="3" placeholder="Текст сообщения"></textarea>
        </div>
        <div class="col-12">
            <button name="submitMes" class="btn btn-primary" type="submit">отправить</button>
        </div>
    </form>
</div>

<div>
    <?php
    foreach ($mes as $key => $message) :
        if ($message['sender_id'] == $_SESSION['id']) :
    ?>
            <div class="post row">
                <div class="col-3">Вы:</div>
                <div class="col-7"><?=$message['text']?></div>
                <div><?=$message['time']?></div>
            </div>
        <?php else : ?>
            <div class="post row" style="background-color: #EEEEEE;">
                <div class="col-3"><?=$username[0]['username']?>:</div>
                <div class="col-7"><?=$message['text']?></div>
                <div><?=$message['time']?></div>
            </div>
    <?php
        endif;
    endforeach;
    ?>
</div>