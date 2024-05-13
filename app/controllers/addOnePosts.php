<?php

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submitAddPost'])){
    $textPost = trim($_POST['textPost']);
    $image = trim($_POST['image']);
    $user_id_post = $_SESSION['id'];
    
    if ($textPost === '' and $image === '') {
        $errMsg = "Не все поля заполнены!";
    } else {
        $addPost = [
            'user_id_post' => $user_id_post,
            'textPost' => $textPost,
            'image' => $image,
        ];
        insert('post', $addPost);
    }
}else{
    $textPost = '';
    $image = '';
    $user_id_post = $_SESSION['id'];
}
