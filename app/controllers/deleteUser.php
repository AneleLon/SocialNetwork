<?php
if (isset($_GET['delete'])) {
  $userId = $_GET['delete'];
  deleteUser($userId);
  header('Location: '. $_SERVER['HTTP_REFERER']);
}