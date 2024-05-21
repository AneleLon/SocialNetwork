<?php
$userId = $_SESSION['id'];

if (strpos($_SERVER['REQUEST_URI'], 'admin') !== false){
    $pathImage ="../../" ;
}else{
    $pathImage ="";
}

foreach ($tape as $key => $tapes) :
    $postId = $tapes['id_post'];
    // Получение количества комментариев
    $comments_count = getCommentsCount($postId);

    $liked = selectTable('likePost', ['id_user' => $userId, 'id_post' => $postId], 'All');
?>
    <div class="post row">
        <div class="d-flex justify-content-between">
            <h2>
                <a href="<?php echo BASE_URL . "userProfile.php?id=" .$tapes['user_id_post'] ; ?>"><?= $tapes['username']; ?></a>
            </h2>
            <?php if ($tapes['user_id_post'] == $userId or $_SESSION['admin'] == 1) : ?>
                <div class="d-flex">
                    <?php if ($_SESSION['admin'] == 1): ?>
                    <div class="mr-2 edit"><a href="<?= BASE_URL . "admin/posts/edit.php?edit=" . $postId ?>">edit</a></div>
                    <?php else: ?>
                    <div class="mr-2 edit"><a href="<?= BASE_URL . "editpost.php?edit=" . $postId ?>">edit</a></div> 
                    <?php endif;?>   
                    <div class=""><a href="?deletePost=<?= $postId ?>">delete</a></div>
                </div>
            <?php endif; ?>
        </div>
        <i class="far fa-calendar"><?= $tapes['created']; ?></i>
        <div class="post_text">
            <p>
                <?= $tapes['textPost']; ?>
            </p>
        </div>
        <div class="container">
            <?php if (!empty($tapes['image'])) : ?>
                <div class="img">
                        <img src="<?=$pathImage;?>assets/imageuser/<?= $tapes['image']; ?>" alt="" class="img-thumbnail">
                </div>
            <?php endif; ?>

        </div>
        <div class="container">
            <div>
                <form action="index.php" method="post" class="d-inline-flex align-items-center">           
                        <p class="mr-2"><?= $tapes['likes'];  ?></p>
                        <input type="hidden" name="post_id" value="<?= $postId; ?>">
                        <input type="hidden" name="like_action" value="like">
                        <input type="checkbox" id="like<?= $postId; ?>" name="like" class="checkboxlike" <?= !empty($liked) ? 'checked' : '' ?>>
                        <label for="like<?= $postId; ?>">
                            <img id="likeImage<?= $postId; ?>" src="<?= !empty($liked) ? $pathImage . "assets/image/likeTrue.png" : $pathImage . "assets/image/like.png" ?>" class="labellike">
                        </label>
                    </form>
                    <div class="d-inline-flex align-items-center ml-3">
                        <p class="mr-2"><?= $comments_count ?></p>
                        <input type="checkbox" id="comment<?= $postId; ?>" class="checkboxcomment">
                        <label for="comment<?= $postId; ?>">
                            <img id="commentImage" src="<?=$pathImage;?>assets/image/comment.png" class="labelcomment">
                        </label>
                    </div>
            </div>
        </div>
        <div id="comments-container<?= $postId; ?>" style="display: none;">
            <?php include($pathImage . "app/include/addComent.php"); ?>
            <?php include($pathImage . "app/include/comments.php"); ?>
        </div>
        <script>
            const likeCheckbox<?= $postId; ?> = document.getElementById('like<?= $postId; ?>');
            const likeImage<?= $postId; ?> = document.getElementById('likeImage<?= $postId; ?>');
            const commentCheckbox<?= $postId; ?> = document.getElementById('comment<?= $postId; ?>');
            const commentsContainer<?= $postId; ?> = document.getElementById('comments-container<?= $postId; ?>');

            likeCheckbox<?= $postId; ?>.addEventListener('change', () => {
                likeCheckbox<?= $postId; ?>.parentNode.submit();
            });

            commentCheckbox<?= $postId; ?>.addEventListener('change', () => {
                if (commentCheckbox<?= $postId; ?>.checked) {
                    commentsContainer<?= $postId; ?>.style.display = 'block';
                } else {
                    commentsContainer<?= $postId; ?>.style.display = 'none';
                }
            });
        </script>
    </div>

<?php endforeach; ?>