<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submitAddCom'])) {
    $textComment = trim($_POST['textComment']);
    $userId = $_SESSION['id']; 
    $postId = $_POST['post_id'];

    $comment = insert('comment', [
        'id_user' => $userId,
        'id_post' => $postId,
        'text_comment' => $textComment,
    ]);
    header('Location: ' . $_SERVER['HTTP_REFERER']);
} else {
    $textComment = '';
}