<div class="post row">
    <h2>
        <a href="userProfile.html" class="username_post">Фамилия Имя</a>
    </h2>
    <i class="far fa-calendar">Mar 11, 2019</i>

    <div class="post_text">
        <p class="post-text">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates, totam natus sit iusto
            quis id, accusantium beatae corporis cum quam eius. Minus delectus eius hic dolores nulla
            possimus tenetur, nostrum optio illo facilis exercitationem asperiores iure quisquam
            corporis deleniti vero blanditiis quidem dolore molestiae et, eveniet, impedit eum eligendi?
            Soluta!
        </p>
    </div>
    <div class="container">

        <div class="img">
            <img src="image/jaxQizFXzkU.png" alt="" class="img-thumbnail">
        </div>
    </div>
    <div class="container statPhoto">
        <div>
            <input type="checkbox" id="like" class="checkboxlike" onclick="changeImageLike()">
            <label for="like"><img id="likeImage" src="assets/image/like.png" class="labellike"></label>
            <script src="assets/js/like.js"></script>
            <input type="checkbox" id="comment" class="checkboxcomment" onclick="changeImageComment()">
            <label for="comment"><img id="commentImage" src="assets/image/comment.png" class="labelcomment"></label>
            <script src="assets/js/comment.js"></script>
        </div>
    </div>
    <!--коммент-->
    <div id="comments-container" style="display: none;">
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
</div>