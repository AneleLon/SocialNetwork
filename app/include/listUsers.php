<div class="container edit-user post row">
    <form class="row row justify-content-center" method="post" action="registration.php">
        <div class="row mb-3 col-10 col-md-6">
            <div class="mb-3 col-10 col-md-8">
                <label for="formGroupExampleInput" class="form-label">username</label>
                <input name="username" value="<?= $username ?>" type="text" class="form-control" id="formGroupExampleInput">
            </div>
            <div class="w-100"></div>
            <div class="mb-3 col-10 col-md-8">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input name="email" value="<?= $email ?>" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="w-100"></div>
            <div class="mb-3 col-10 col-md-8">
                <label for="exampleInputPassword1" class="form-label">Пароль</label>
                <input name="password" type="password" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="w-100"></div>
            <div class="mb-3 col-10 col-md-8">
                <label for="exampleInputAdmin" class="form-label">admin</label>
                <input name="admin" type="password" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="w-100"></div>
            <div class="mb-3 col-10 col-md-8">
                <button type="submit" class="btn btn-primary" name="submit-reg">Изменить</button>
            </div>
        </div>
        <div class="row mb-3 col-10 col-md-4">
            <div class="mb-3">
                <label for="content" class="form-label">Инфо</label>
                <textarea class="form-control" id="content" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <label for="formFileSm" class="form-label">Редактировать фото</label>
                <input class="form-control form-control-sm" id="formFileSm" type="file">
            </div>
        </div>
    </form>
</div>
<div class="row title-table post">
    <div class="col-1">ID</div>
    <div class="col-3">Username</div>
    <div class="col-2">Admin</div>
    <div class="col-1">Edit</div>
    <div class="col-1">delete</div>
</div>
<div class="row post">
    <div class="col-1">1</div>
    <div class="col-3">User1</div>
    <div class="col-2">Admin</div>
    <div class="col-1"><a href="#">Edit</a></div>
    <div class="col-1"><a href="#">delete</a></div>
</div>