<div class="section search">
    <?php if (strpos($_SERVER['REQUEST_URI'], 'admin') !== false) {
        $pathImage = "index.php";
    } else {
        $pathImage = "subs.php";
    } ?>
    <h3>Поиск</h3>
    <form action="<?=$pathImage ?>" method="get">
        <input type="text" name="search-user" class="text-input" placeholder="Поиск...">
    </form>

    <script>
        const searchInput = document.querySelector('input[name="search-user"]');
        searchInput.addEventListener('keydown', function(event) {
            if (event.key === 'Enter') {
                this.form.submit(); // Отправка формы
            }
        });
    </script>
</div>
<?php
if (strpos($_SERVER['REQUEST_URI'], 'admin') !== false) {
    $filerPath = "admin/subs/index.php";
} else {
    $filerPath = "subs.php";
}
?>
<div class="section filter">
    <h3>Фильтр</h3>
    <ul>
        <li><a href="<?= BASE_URL . $filerPath . "?filter=" . "NEWSUBS" ?>">Новые</a></li>
        <li><a href="<?= BASE_URL . $filerPath . "?filter=" . "OLDSUBS" ?>">Старые</a></li>
    </ul>
</div>