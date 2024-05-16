<?php
if (isset($_GET['delete'])) {
  $userId = $_GET['delete'];
  deleteUser($userId);
  $current_url = $_SERVER['REQUEST_URI'];
  if (preg_match('/\/SocialNetwork\/editUserProfile\.php/', $current_url)) {
    header('Location: ' . BASE_URL . "auto.php");
  } else {
    header('Location: ' . $_SERVER['HTTP_REFERER']);
  }
}
