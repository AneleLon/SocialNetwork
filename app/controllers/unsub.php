<?php
if (isset($_GET['unsub'])) {
  $userId = $_GET['unsub'];
  deleteSub($userId,$_SESSION['id']);
  header('Location: '. $_SERVER['HTTP_REFERER']);
}