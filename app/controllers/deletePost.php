<?php
if (isset($_GET['deletePost'])) {
  $id = $_GET['deletePost'];
  delete('post', $id, 'id_post');
  if ($_SESSION['admin'] == 1) {
    header('Location: ' . BASE_URL . "admin/posts/index.php");
  } else {
    header('Location: ' . BASE_URL);
  }
}