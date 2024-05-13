<?php
$tape = selectTablePost();
$userId = $_SESSION['id'];
foreach ($tape as $key => $tapes) :
    $postId = $tapes['id_post'];
    $liked = selectTable('likePost', ['id_user' => $userId, 'id_post' => $postId], 'All'); //?
?>
    <div class="post row">
        <div class="d-flex justify-content-between">
            <h2>
                <a href="#"><?= $tapes['username']; ?></a>
            </h2>
            <div class="d-flex">
                <div class="mr-2 edit"><a href="#">редактировать</a></div>
                <div class=""><a href="#">удалить</a></div>
            </div>
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
                    <img src="../../assets/imageuser/<?= $tapes['image']; ?>" alt="" class="img-thumbnail">
                </div>
            <?php endif; ?>
        </div>
        <div class="container">
            <div>
                <form action="index.php" method="post" class="d-inline">
                    <input type="hidden" name="post_id" value="<?= $postId; ?>">
                    <input type="hidden" name="like_action" value="like">
                    <input type="checkbox" id="like<?= $postId; ?>" name="like" class="checkboxlike" <?= !empty($liked) ? 'checked' : '' ?>>
                    <label for="like<?= $postId; ?>">
                        <img id="likeImage<?= $postId; ?>" src="<?= !empty($liked) ? '../../assets/image/likeTrue.png' : '../../assets/image/like.png' ?>" class="labellike">
                    </label>
                </form>

                <input type="checkbox" id="comment<?= $postId; ?>" class="checkboxcomment">
                <label for="comment<?= $postId; ?>">
                    <img id="commentImage" src="../../assets/image/comment.png" class="labelcomment">
                </label>
            </div>
        </div>
        <div id="comments-container<?= $postId; ?>" style="display: none;">
            <?php include("../../app/include/addComent.php"); ?>
            <?php include("../../app/include/comments.php"); ?>
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