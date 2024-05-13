<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['like_action']) && $_POST['like_action'] == 'like') {
    $userId = $_SESSION['id']; 
    $postId = $_POST['post_id'];

    if (isset($_POST['like'])) { 
        insert('likePost', [
            'id_user' => $userId,
            'id_post' => $postId,
        ]);
    } else {
        deleteLike($userId, $postId);
    }

    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
}