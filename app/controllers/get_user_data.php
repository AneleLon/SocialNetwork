<?php
if (isset($_GET['edit'])) {
  $userId = $_GET['edit'];
  $user = selectTable('users', ['id_users' => $userId], 1)[0];
}