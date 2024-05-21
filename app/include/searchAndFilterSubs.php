<div class="section search">
    <h3>Поиск</h3>
    <form action="subs.php" method="get">
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
if (strpos($_SERVER['REQUEST_URI'], 'admin') !== false){
    $filerPath ="admin/posts/" ;
}else{
    $filerPath ="";
}
?>
<div class="section filter">
    <h3>Фильтр</h3>
    <ul>
        <li><a href="<?= BASE_URL . $filerPath . "subs.php?filter=" . "NEWSUBS" ?>">Новые</a></li>
        <li><a href="<?= BASE_URL . $filerPath . "subs.php?filter=" . "OLDSUBS" ?>">Старые</a></li>
    </ul>
</div>