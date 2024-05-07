<?php
include "app/database/db.php";

$errMsg = '';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $admin = 0;
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $pass1 = trim($_POST['password']);
    $pass2 = trim($_POST['password2']);

    if($login === '' || $email === '' || $pass1 === '' || $pass2 === '' ){
        $errMsg = "Не все поля заполнены!";
    }elseif(mb_strlen($username, 'UTF8') < 4){
        $errMsg = "Username более 4 символов";
    }elseif($pass1 !== $pass2){
        $errMsg = "Пароли не совпадают";
    }else{
        $pass = password_hash($pass2, PASSWORD_DEFAULT);
        $post = [
            'admin' => $admin,
            'username' => $username,
            'email' => $email,
            'password' => $pass
        ];
    
        //$id = insert('users', $post);
        tt($post);

    }

}else{
    $username = '';
    $email = '';
}

    //$pass = password_hash($_POST['password2'], PASSWORD_DEFAULT);