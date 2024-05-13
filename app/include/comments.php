<?php
$comments = selectTable('comment', ['id_post' => $postId], 'All');

foreach ($comments as $comment) :
    $user = selectTable('users', ['id_users' => $comment['id_user']], 1)[0];
?>
    <div class="post_comment row">
        <h2>
            <a href="userProfile.html" class="username_post_comment"><?= $user['username']; ?></a>
        </h2>
        <i class="far fa-calendar username_post_comment"><?= $comment['time_com']; ?></i>
        <div class="post_text">
            <p class="post-text">
                <?= $comment['text_comment']; ?>
            </p>
        </div>
        <form action="index.php" method="post">
            <input type="hidden" name="comment_id" value="<?= $postId;?>">
            <button type="submit">Удалить</button>
        </form>
    </div>
<?php endforeach; ?>