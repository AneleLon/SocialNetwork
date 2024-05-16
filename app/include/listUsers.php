<?php
if (isset($_GET['edit'])) {
  $userId = $_GET['edit'];
  $user = selectTable('users', ['id_users' => $userId], 1)[0];
}?>
<div class="container edit-user post row">
    <form class="row row justify-content-center" method="post" action="index.php">
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
            <div class="mb-3 col-10 col-md-8">
                <label for="exampleInputAdmin" class="form-label">admin</label>
                <input name="admin" type="text" class="form-control" id="exampleInputAdmin" value="<?php echo $user['admin'] ?? ''; ?>">
            </div>
            <div class="w-100"></div>
            <div class="mb-3 col-10 col-md-8">
                <button type="submit" class="btn btn-primary" name="submit-edit">Изменить</button>
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
<div class="row title-table post">
    <div class="col-1">ID</div>
    <div class="col-3">Username</div>
    <div class="col-2">Admin</div>
</div>
<?php
$usersAll = selectUserAndStatusSub('users', $_SESSION['id']);
foreach ($usersAll as $key => $user) :
?>
    <?php if ($user['id_users'] !== $_SESSION['id']) : ?>
        <div class="row post">
            <div class="col-1"><?= $user['id_users'] ?></div>
            <div class="col-3"><?= $user['username'] ?></div>
            <div class="col-2"><?= $user['admin'] ?></div>
            <div class="col-1">
                <a href="?edit=<?= $user['id_users'] ?>" class="btn btn-primary">edit</a>
            </div>
            <div class="col-2">
                <a href="?delete=<?= $user['id_users'] ?>" class="btn btn-primary">delete</a>
            </div>
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