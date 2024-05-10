<div class="post row">
    <div class="d-flex justify-content-between">
        <h2>
            <a href="#">user</a>
        </h2>
        <div class="d-flex">
            <div class="mr-2 edit"><a href="#">редактировать</a></div>
            <div class=""><a href="#">удалить</a></div>
        </div>
    </div>
    <a href="#">id</a>
    <i class="far fa-calendar">Mar 11, 2019</i>

    <div class="post_text">
        <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates, totam natus sit iusto
            quis id, accusantium beatae corporis cum quam eius. Minus delectus eius hic dolores nulla
            possimus tenetur, nostrum optio illo facilis exercitationem asperiores iure quisquam
            corporis deleniti vero blanditiis quidem dolore molestiae et, eveniet, impedit eum eligendi?
            Soluta!
        </p>
    </div>
    <div class="container">
        <div class="img">
            <img src="../../assets/imageuser/jaxQizFXzkU.png" alt="" class="img-thumbnail">
        </div>
    </div>

    <!-- лайк и коммент -->
    <div class="container ">
        <div>
            <input type="checkbox" id="like" class="checkboxlike" onclick="changeImageLike()">
            <label for="like"><img id="likeImage" src="../../assets/image/like.png" class="labellike"></label>
            <script src="../../assets/js/like.js"></script>
            
            
            <input type="checkbox" id="comment" class="checkboxcomment" onclick="changeImageComment()">
            <label for="comment"><img id="commentImage" src="../../assets/image/comment.png" class="labelcomment"></label>
            <script src="../../assets/js/comment.js"></script>
        </div>
    </div>
    <!--коммент-->
    <div id="comments-container" style="display: none;">
        <?php include("comments.php");
        ?>
    </div>
</div>