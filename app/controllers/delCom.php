<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['comment_id'])) {
    $commentId = $_POST['comment_id'];

    // Проверка на авторизацию (пример):
    $comment = selectTable('comment', ['id_comment' => $commentId], 1)[0];
    if ($comment['id_user'] == $_SESSION['id'] || $_SESSION['admin']) { // Проверяем, является ли текущий пользователь автором комментария или администратором
        delete('comment', $commentId, 'id_comment');
        header('Location: ' . $_SERVER['HTTP_REFERER']); // Перенаправляем обратно на страницу
        exit;
    } else {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}