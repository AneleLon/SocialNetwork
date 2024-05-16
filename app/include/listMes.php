<?php
$latestMessages = getLatestMessagesWithUsers($_SESSION['id']);
?>
<div>
    <ul>
        <?php foreach ($latestMessages as $key => $message) :?>
        <li onclick="location.href='<?php echo BASE_URL . "/admin/messages/dialogue.php?id=" . $message['id']; ?>';">
            <div class="row post">
                <div class="col-3"><?=$message['username']?></div>
                <div class="col-5"><?=$message['last_message']?></div>
                <div class="col-3"><?=$message['last_message_time']?></div>
            </div>
        </li>
        <?php endforeach;?>
    </ul>
</div>