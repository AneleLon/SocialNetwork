<?php
session_start();
include 'path.php';

unset($_SESSION['id']);
unset($_SESSION['username']);
unset($_SESSION['admin']);


header('Location: ' . BASE_URL);