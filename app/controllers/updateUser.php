<?php

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit-edit'])){
    $id = trim($_POST['user_id']);
    $username= trim($_POST['username']);
    $email = trim($_POST['email']);
    $password= trim($_POST['password']);
    $password = password_hash($password, PASSWORD_DEFAULT);
    $admin = trim($_POST['admin']);
    $info= trim($_POST['info']);
    $image = trim($_POST['image']);
    
        $editUser = [
            'info' => $info,
            'avatar' => $image,
            'email' => $email,
            'admin' => $admin,
            'username' => $username,
            'password' => $password,
        ];
        update('users',$id,'id_users',$editUser);
        header('Location: ' . $_SERVER['HTTP_REFERER']);

}else{
    //проверку на уникальность username и email
}