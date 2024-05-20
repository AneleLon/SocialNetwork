<?php

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['editPost'])){
    $id = trim($_POST['id']);
    $text= trim($_POST['textPost']);
    $image = trim($_POST['image']);
    if(!empty($image)){
        $editPost = [
            'textPost' => $text,
            'image' => $image
        ];
    }else{
        $editPost = [
            'textPost' => $text
        ];
    }
        update('post',$id,'id_post',$editPost);
        if ($_SESSION['admin'] == 1){
        header('Location: ' . BASE_URL . "admin/posts/index.php");}
        else{
            header('Location: ' . BASE_URL );
        }

}else{
    //проверку надо бы сделать
}