<div class="row title-table post">
    <div class="col-1">ID</div>
    <div class="col-3">Пользователь</div>
    <div class="col-1">delete</div>
</div>
<?php
$usersAll = selectSubscribedUsers('users', $_SESSION['id']);
foreach ($usersAll as $key => $user) :
?>
    <?php if ($user['id_users'] !== $_SESSION['id']) : ?>
        <div class="row post">
            <div class="col-1"><?= $user['id_users'] ?></div>
            <div class="col-3"><?= $user['username'] ?></div>
            <div class="col-1">
                <a href="?unsub=<?= $user['id_users'] ?>" class="btn btn-primary">unsub</a>
            </div>
        </div>
    <?php endif ?>
<?php endforeach; ?>