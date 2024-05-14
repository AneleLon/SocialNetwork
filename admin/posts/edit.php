<?php
include '../../path.php';
include '../../app/database/db.php';
include "../../app/controllers/editPost.php";
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
    <link rel="stylesheet" href="../../assets/css/admin.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300..700&display=swap" rel="stylesheet">
    <title>Социальная сеть</title>
</head>

<body>
    <?php include("../../app/include/headerAdmin.php");
    $editPost = selectTable('post', ['id_post' => $_GET['edit']], 1);
    tt($editPost);
    foreach ($editPost as $key => $value) :
    ?>
        <div class="container">
            <div class="container row">
                <div class="col-md-6">
                    <div class="post row add-post">
                        <form action="edit.php" method="post">
                            <input type="hidden" name="id" value="<?=$value['id_post']; ?>">
                            <div class="mb-3">
                                <label for="content" class="form-label"></label>
                                <textarea name="textPost" class="form-control" id="content" rows="3"><?=$value['textPost']; ?></textarea>
                            </div>
                            <div class="container">
                                <?php if (!empty($value['image'])) : ?>
                                    <div class="img">
                                        <img src="../../assets/imageuser/<?= $value['image']; ?>" alt="" class="img-thumbnail">
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="mb-3">
                                <label for="formFileSm" class="form-label"></label>
                                <input name="image" class="form-control form-control-sm" id="formFileSm" type="file">
                            </div>
                            <div class="col-12">
                                <button name="editPost" class="btn btn-primary" type="submit">Изменить</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>




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