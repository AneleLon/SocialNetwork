<?php include 'path.php';
include 'app/database/db.php';
include "app/controllers/sub.php";
include "app/controllers/unsub.php";
include "app/controllers/listUsers.php";
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
            <!--Лента-->
            <div class="col-md-8">
                <div class="row title-table post">
                    <div class="col-1">ID</div>
                    <div class="col-3">Username</div>
                    <div class="col-2">Admin</div>
                </div>
                <?php
                
                foreach ($usersAll as $key => $user) :
                ?>
                    <?php if ($user['id_users'] !== $_SESSION['id']) : ?>
                        <div class="row post">
                            <div class="col-1"><?= $user['id_users'] ?></div>
                            <div class="col-3"><?= $user['username'] ?></div>
                            <div class="col-2"><?= $user['admin'] ?></div>
                            <?php if ($user['is_subscribed'] === 0) : ?>
                                <div class="col-1">
                                    <a href="?sub=<?= $user['id_users'] ?>" class="btn btn-primary">sub</a>
                                </div>
                            <?php else : ?>
                                <div class="col-1">
                                    <a href="?unsub=<?= $user['id_users'] ?>" class="btn btn-primary">unsub</a>
                                </div>
                            <?php endif ?>
                        </div>
                    <?php endif ?>
                <?php endforeach; ?>
            </div>
            <!--поиск и фильтр-->
            <div class="sidebar col-md-3">
                <?php include("app/include/searchUsers.php");
                ?>
            </div>
        </div>
    </div>



</body>

</html>