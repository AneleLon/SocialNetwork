<?php
include "path.php";
include 'app/database/db.php';
include "app/controllers/updateUser.php";
include "app/controllers/deleteUser.php";

if (isset($_GET['edit'])) {
    $userId = $_GET['edit'];
    $user = selectTable('users', ['id_users' => $userId], 1)[0];
}
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
    <div class="col-2"></div>
    <div class="container edit-user post col-8">
        <form class="row row justify-content-center" method="post" action="editUserProfile.php">
            <div class="row mb-3 col-10 col-md-6">
                <input type="hidden" name="user_id" value="<?php echo $user['id_users'] ?? ''; ?>">
                <div class="mb-3 col-10 col-md-8">
                    <label for="formGroupExampleInput" class="form-label">username</label>
                    <input name="username" type="text" class="form-control" id="formGroupExampleInput" value="<?php echo $user['username'] ?? ''; ?>">
                </div>
                <div class="w-100"></div>
                <div class="mb-3 col-10 col-md-8">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $user['email'] ?? ''; ?>">
                </div>
                <div class="w-100"></div>
                <div class="mb-3 col-10 col-md-8">
                    <label for="exampleInputPassword1" class="form-label">Пароль</label>
                    <input name="password" type="password" class="form-control" id="exampleInputPassword1" value="">
                </div>
                <div class="w-100"></div>
                <?php if ($_SESSION['admin']==1) : ?>
                <div class="mb-3 col-10 col-md-8">
                    <label for="exampleInputAdmin" class="form-label">admin</label>
                    <input name="admin" type="text" class="form-control" id="exampleInputAdmin" value="<?php echo $user['admin'] ?? ''; ?>">
                </div>
                <?php else: ?>
                    <input name="admin" type="hidden" class="form-control" id="exampleInputAdmin" value="<?php echo $user['admin'] ?? ''; ?>">
                <?php endif;?>
                <div class="w-100"></div>
                <div class="mb-3 col-10 col-md-8">
                    <button type="submit" class="btn btn-primary" name="submit-edit">Изменить</button>
                </div>
                <div class="col-2">
                    <a href="?delete=<?= $user['id_users'] ?>" class="btn btn-primary">delete</a>
                </div>
            </div>
            <div class="row mb-3 col-10 col-md-4">
                <div class="mb-3">
                    <label for="content" class="form-label">Инфо</label>
                    <textarea name="info" class="form-control" id="content" rows="3"><?php echo $user['info'] ?? ''; ?></textarea>
                </div>
                <div class="mb-3">
                    <label for="formFileSm" class="form-label">Редактировать фото</label>
                    <input name="image" class="form-control form-control-sm" id="formFileSm" type="file">
                </div>
            </div>
            <!-- Сюда бы вывести ошибки -->
        </form>
    </div>
    <div class="col-2"></div>

</body>

</html>