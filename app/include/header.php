<header class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-2">
                <h1>
                    <a href="<?php echo BASE_URL; ?>">AneleLon</a>
                </h1>
            </div>
            <nav class="col-10">
                <ul>
                    <li><a href="<?php echo BASE_URL ?>"><img width="24" height="24" src="assets/image/news.png" />
                            Лента</a>
                    </li>
                    <li><a href="#"><img width="24" height="24" src="assets/image/message.png" />
                            Сообщения</a>
                    </li>
                    <li><a href="#"><img width="24" height="24" src="assets/image/users.png" />
                            Подписки</a>
                    </li>
                    </li>
                    <li>
                        <?php if (isset($_SESSION['id']) and $_SESSION['admin'] === 1) : ?>
                            <a href="<?php echo BASE_URL . "userProfile.php"; ?>"><img width="24" height="24" src="assets/image/users.png">
                                <?php echo $_SESSION['username']; ?>
                            </a>
                            <ul>
                                <li><a href="<?= BASE_URL . "editUserProfile.php?edit=" . $_SESSION['id'] ?>">Редактировать личную страницу</a></li>
                                <li><a href="<?php echo BASE_URL . "admin/posts/index.php"; ?>">Админ панель</a>
                                <li><a href="<?php echo BASE_URL . "logout.php"; ?>"">Выход</a>
                                </li>
                            </ul>
                        <?php elseif (isset($_SESSION['id']) and $_SESSION['admin'] === 0) : ?>
                            <a href=" <?php echo BASE_URL . "userProfile.php"; ?>"><img width="24" height="24" src="assets/image/users.png">
                                        <?php echo $_SESSION['username']; ?></a>
                                    <ul>
                                        <li><a href="<?= BASE_URL . "editUserProfile.php?edit=" . $_SESSION['id'] ?>">Редактировать личную страницу</a></li>
                                        <li><a href="<?php echo BASE_URL . "logout.php"; ?>">Выход</a>
                                        </li>
                                    </ul>
                                <?php else : ?>
                                    <a href="<?php echo BASE_URL . "auto.php"; ?>"><img width="24" height="24" src="assets/image/in.png">
                                        Вход</a>
                                    <ul>
                                        <li><a href="<?php echo BASE_URL . "registration.php"; ?>">Регистрация</a></li>
                                    </ul>
                                <?php endif ?>
                                </li>
                            </ul>
            </nav>
        </div>
    </div>
</header>