<?php
include "path.php";
include 'app/database/db.php';
$info = selectTable('users', ['id_users' => $_SESSION['id']], 1)[0];

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
    <div class="container">
        <div class="container row">
            <div class="col-md-3">
                <?php include("app/include/alerts.php");
                ?>
            </div>
            <div class="col-md-6">
                <div class="container">
                    <div class="row post info_profile">
                        <div class="col-md-auto">
                            <img src="assets/imageuser/<?=$info['avatar']?>" alt="" class="img-thumbnail img_ava">
                        </div>
                        <div class="col-md">
                            <h3><?=$info['username']?></h3>
                            <p><?=$info['info']?></p>
                        </div>
                    </div>
                    <?php include("app/include/tapeBlock.php");
                    ?>
                </div>
            </div>
            <div class="sidebar col-md-3">
                <?php include("app/include/searchAndFilter.php");
                ?>
            </div>
        </div>
  
</body>

</html>