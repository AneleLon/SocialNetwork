<?php
if (isset($_GET['sub'])) {
  $userId = $_GET['sub'];
  insert('subscriber',['id'=>$userId,'idSub'=>$_SESSION['id']]);
  header('Location: '. $_SERVER['HTTP_REFERER']);
}