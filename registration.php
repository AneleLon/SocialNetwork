<?php
include "path.php";
include "app/controllers/users.php";
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

    <header class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-2">
                    <h1>
                        <a href="<?php echo BASE_URL ?>">AneleLon</a>
                    </h1>
                </div>
            </div>
        </div>
    </header>
    <!--Форма регистрации-->
    <div class="container reg_form">
        <form class="row row justify-content-center" method="post" action="registration.php">
            <h2 class="">Регистрация</h2>
            <div class="mb-3 col-10 col-md-4">
                <label for="formGroupExampleInput" class="form-label">Введите ваш username</label>
                <input name="username" value="<?= $username ?>" type="text" class="form-control" id="formGroupExampleInput">
            </div>
            <div class="w-100"></div>
            <div class="mb-3 col-10 col-md-4">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input name="email" value="<?= $email ?>" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="w-100"></div>
            <div class="mb-3 col-10 col-md-4">
                <label for="exampleInputPassword1" class="form-label">Пароль</label>
                <input name="password" type="password" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="w-100"></div>
            <div class="mb-3 col-10 col-md-4">
                <label for="exampleInputPassword2" class="form-label">Подтвердите пароль</label>
                <input name="password2" type="password" class="form-control" id="exampleInputPassword2">
            </div>
            <div class="w-100"></div>
            <div class="mb-3 col-10 col-md-4 err">
                <p><?= $errMsg ?></p>
            </div>
            <div class="w-100"></div>
            <div class="mb-3 col-10 col-md-4">
                <button type="submit" class="btn btn-primary" name="submit-reg">Зарегистрироваться</button>
                <a href="<?php echo BASE_URL . "auto.php"; ?>"> Авторизоваться </a>
            </div>
        </form>
    </div>

</body>

</html>