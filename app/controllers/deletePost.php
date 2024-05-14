<?php
if (isset($_GET['deletePost'])) {
  $id = $_GET['deletePost'];
  delete('post',$id,'id_post');
  header('Location: ' . BASE_URL . "admin/posts/index.php");
}