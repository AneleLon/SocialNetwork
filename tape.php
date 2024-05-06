<?php include("path.php");
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" integrity="sha384-dpuaG1suU0eT09tx5plTaGMLBsfDLzUCCUXOY2j/LSvXYuG6Bqs43ALlhIqAJVRb" crossorigin="anonymous">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300..700&display=swap" rel="stylesheet">
    <title>Социальная сеть</title>
</head>

<body>
    <?php include("app/include/header.php");
    ?>
    <!--main-->
    <div class="container">
        <div class="container row">
            <!--оповещения-->
            <div class="col-md-3">
                <div class="section search">
                    <h3>Оповещения</h3>
                    <div class="section filter">
                        <ul>
                            <li><a href="#">xxxx</a></li>
                            <li><a href="#">xxxxx</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!--Лента-->
            <div class="col-md-6">
                <!--1 пост-->
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
                    <!--1 пост коммент-->
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
            </div>
            <!--конец поста-->
            <!--поиск и всё такое-->
            <div class="sidebar col-md-3">
                <div class="section search">
                    <h3>Поиск</h3>
                    <form action="index.html" method="post">
                        <input type="text" name="search-term" class="text-input" placeholder="Поиск...">
                    </form>
                </div>

                <div class="section filter">
                    <h3>Фильтр</h3>
                    <ul>
                        <li><a href="#">Популярные</a></li>
                        <li><a href="#">Не популярные</a></li>
                    </ul>
                </div>
            </div>
        </div>




        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

        <!-- Option 2: Separate Popper and Bootstrap JS -->
        <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    -->
</body>

</html>