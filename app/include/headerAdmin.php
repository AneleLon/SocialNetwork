<header class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-2">
                <h1>
                    <a href="<?php echo BASE_URL; ?>">AneleLon</a>
                </h1>
            </div>
            <nav class="col-10">
            <!-- <?php if (isset($_SESSION['id'])): ?> -->
                <ul>
                    <li><a href="#"><img width="24" height="24" src="assets/image/users.png">
                        Пользователи</a>
                    </li>
                    <li><a href="#"><img width="24" height="24" src="assets/image/news.png">
                        Посты</a>
                    </li>
                    <li><a href="#"><img width="24" height="24" src="assets/image/sub.png">
                        Подписки</a>
                    </li><a href="#"><img width="24" height="24" src="assets/image/message.png">
                        Сообщения</a>
                    </li>
                    <li>
                        <a href="<?php echo BASE_URL . "userProfile.php"; ?>"><img width="24" height="24" src="assets/image/admin.png">
                            <?php echo $_SESSION['username']; ?>
                        </a>
                        <ul>
                            <li><a href="<?php echo BASE_URL . "admin/admin.php"; ?>">Выйти из Админ панели</a>
                            <li><a href="<?php echo BASE_URL . "logout.php"; ?>"">Выход</a>
                                </li>
                            </ul>
                    </li>
                </ul>
            <!-- <?php endif ?> -->
            </nav>
        </div>
    </div>
</header>