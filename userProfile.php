<?php
include "path.php";
include 'app/database/db.php';
include "app/controllers/tapeBlockControl.php";
include "app/controllers/sub.php";
include "app/controllers/unsub.php";
include "app/controllers/deletePost.php";
$info = selectTable('users', ['id_users' => $_GET['id']], 1)[0];
$subscriber = getSubscriberCount($_GET['id']);
$subscription = getSubscriptionCount($_GET['id']);
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
                        <div class="col-4">
                            <img src="<?= !empty($info['avatar']) ? "assets/imageuser/" . $info['avatar'] : "assets/image/ava.png" ?>" alt="" class="img-thumbnail img_ava">
                        </div>
                        <div class="col-5 ">
                            <h3><?= $info['username'] ?></h3>

                            <p class="text-wrap" style="word-break: break-all;"><?= $info['info'] ?></p>
                        </div>
                        <div class="col-3 ">
                            <?php if ($_SESSION['id'] !== $info['id_users']) :
                                $profileUserId = $info['id_users'];
                                $isSubscribed = isSubscribed($_SESSION['id'], $profileUserId);
                                if ($isSubscribed) : ?>
                                    <div class="col-1">
                                        <a href="?unsub=<?= $info['id_users'] ?>" class="btn btn-primary">unsub</a>
                                    </div>
                                <?php else : ?>
                                    <div class="col-1">
                                        <a href="?sub=<?= $info['id_users'] ?>" class="btn btn-primary">sub</a>
                                    </div>

                                <?php endif ?>
                                <div class = "mes">
                                <a href="<?php echo BASE_URL . "dialogue.php?id=" .$info['id_users'] ; ?>" class="btn btn-primary">message</a></div>
                            <?php endif ?>
                        </div>
                    </div>
                    <div class = "row post">
                            <div class="col-4"><a href="#" >Подписчиков <?=$subscriber?></a></div>
                            <div class="col-5"><a href="#" >Подписок <?=$subscription?></a> </div>
                        </div>
                    <?php include("app/include/tapeBlock.php");
                    ?>
                </div>
            </div>
            <div class="sidebar col-md-3">
                <?php include("app/include/searchProfile.php");
                ?>
            </div>
        </div>
    </div>

</body>

</html>