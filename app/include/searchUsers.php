<div class="section search">
    <?php if (strpos($_SERVER['REQUEST_URI'], 'admin') !== false) {
        $pathImage = "index.php";
    } else {
        $pathImage = "users.php";
    } ?>
    <h3>Поиск</h3>
    <form action="<?=$pathImage?>" method="get">
        <input type="text" name="search-user-all" class="text-input" placeholder="Поиск...">
    </form>

    <script>
        const searchInput = document.querySelector('input[name="search-user-all"]');
        searchInput.addEventListener('keydown', function(event) {
            if (event.key === 'Enter') {
                this.form.submit(); // Отправка формы
            }
        });
    </script>
</div>