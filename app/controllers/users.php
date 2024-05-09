<?php
include "app/database/db.php";
$errMsg = '';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $admin = 0;
    $username = trim($_POST['username']); // trim - пробелы убирает
    $email = trim($_POST['email']);
    $pass1 = trim($_POST['password']);
    $pass2 = trim($_POST['password2']);



    if ($username === '' || $email === '' || $pass1 === '' || $pass2 === '') {
        $errMsg = "Не все поля заполнены!";
    } elseif (mb_strlen($username, 'UTF8') < 4) {
        $errMsg = "Username более 4 символов";
    } elseif ($pass1 !== $pass2) {
        $errMsg = "Пароли не совпадают";
    } else {
        $existenceEmail = selectTable('users', ['email' => $email], 1);
        $existenceUsername = selectTable('users', ['username' => $username], 1);
        if (empty($existenceEmail) and empty($existenceUsername)) {
            $pass = password_hash($pass2, PASSWORD_DEFAULT);
            $post = [
                'admin' => $admin,
                'username' => $username,
                'email' => $email,
                'password' => $pass
            ];
            $id = insert('users', $post);
            $user = selectTable('users', ['id_users' => $id], 1);
            $_SESSION['id'] = $user[0]['id_users'];
            $_SESSION['username'] = $user[0]['username'];
            $_SESSION['admin'] = $user[0]['admin'];

            if($_SESSION['admin']){
                header('Location: ' . BASE_URL . "admin/admin.php");
            }else{
                header('Location: ' . BASE_URL);
            }

        } else {
            $errMsg = "username или почта занята";
        }
    }
} else {
    $username = '';
    $email = '';
}