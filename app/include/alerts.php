<?php
$mes = getLatestMessagesWithUsers($_SESSION['id'], 5);
?>
<div class="section search">
    <h3>Последние диалоги</h3>
    <div class="section filter">
        <ul>
            <?php foreach ($mes as $message) :?>
            <li><a href="<?php echo BASE_URL . "dialogue.php?id=" . $message['id'] ; ?>"><?=$message['username']?></a></li>
            <?php endforeach;?>
        </ul>
    </div>
</div>