<?php
tt($tape);
?>
<?php
foreach ($tape as $key => $tapes) :
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
                <input type="checkbox" id="like" class="checkboxlike">
                <label for="like">
                    <img id="likeImage" src="../../assets/image/like.png" class="labellike">
                </label>
                <input type="checkbox" id="comment" class="checkboxcomment">
                <label for="comment">
                    <img id="commentImage" src="../../assets/image/comment.png" class="labelcomment">
                </label>
            </div>
        </div>
        <div id="comments-container" style="display: none;">
            <?php include("../../app/include/addComent.php");
            ?>
            <div class="post_comment row">
                <h2>
                    <a href="userProfile.html" class="username_post_comment">Фамилия Имя</a>
                </h2>
                <i class="far fa-calendar username_post_comment">Mar 11, 2019</i>
                <div class="post_text">
                    <p class="post-text">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates, totam natus sit
                        iusto
                        quis id, accusantium beatae corporis cum quam eius.
                    </p>
                </div>
            </div>
        </div>

        <script>
            const likeCheckbox = document.getElementById('like');
            const likeImage = document.getElementById('likeImage');
            const commentCheckbox = document.getElementById('comment');
            const commentsContainer = document.getElementById('comments-container');

            likeCheckbox.addEventListener('change', () => {
                if (likeCheckbox.checked) {
                    likeImage.src = '../../assets/image/likeTrue.png';
                } else {
                    likeImage.src = '../../assets/image/like.png';
                }
            });

            commentCheckbox.addEventListener('change', () => {
                if (commentCheckbox.checked) {
                    commentsContainer.style.display = 'block';
                } else {
                    commentsContainer.style.display = 'none';
                }
            });
        </script>
    </div>
<?php endforeach; ?>