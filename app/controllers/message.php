<?php
if(!empty($_GET)){
    $latestMessages = searchMessagesWithUsers($_SESSION['id'],trim($_GET['search-mes']));
}else{
    $latestMessages = getLatestMessagesWithUsers($_SESSION['id']);
}
