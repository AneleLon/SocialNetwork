<div class="section search">
    <h3>Поиск</h3>
    <form action="index.php" method="get">
        <input type="text" name="search-term" class="text-input" placeholder="Поиск...">
    </form>

    <script>
        const searchInput = document.querySelector('input[name="search-term"]');
        searchInput.addEventListener('keydown', function(event) {
            if (event.key === 'Enter') {
                this.form.submit(); // Отправка формы
            }
        });
    </script>
</div>
<?php
if (strpos($_SERVER['REQUEST_URI'], 'admin') !== false){
    $filerPath ="admin/posts/" ;
}else{
    $filerPath ="";
}
?>
<div class="section filter">
    <h3>Фильтр</h3>
    <ul>
        <li><a href="<?= BASE_URL . $filerPath . "index.php?filter=" . "NEW" ?>">Новые</a></li>
        <li><a href="<?= BASE_URL . $filerPath . "index.php?filter=" . "OLD" ?>">Старые</a></li>
        <li><a href="<?= BASE_URL . $filerPath . "index.php?filter=" . "POPULAR" ?>">Популярные</a></li>
        <li><a href="<?= BASE_URL . $filerPath . "index.php?filter=" . "NOPOPULAR" ?>">Не популярные</a></li>
    </ul>
</div>