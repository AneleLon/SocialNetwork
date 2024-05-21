<div class="row title-table post">
    <div class="col-1">ID</div>
    <div class="col-3">Пользователь</div>
</div>
<?php

foreach ($usersAll as $key => $user) :
?>
        <div class="row post">
            <div class="col-1"><?= $user['id_users'] ?></div>
            <div class="col-3"><a href="<?php echo BASE_URL . "userProfile.php?id=" .$user['id_users'] ; ?>"><?= $user['username'] ?></a></div>
            <div class="col-1">
                <a href="?unsub=<?= $user['id_users'] ?>" class="btn btn-primary">unsub</a>
            </div>
        </div>
<?php endforeach; ?>