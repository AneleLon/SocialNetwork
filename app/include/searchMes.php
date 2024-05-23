<div class="section search">
    <h3>Поиск</h3>
    <?php 
    if (strpos($_SERVER['REQUEST_URI'], 'admin') !== false){
        $pathImage ="index.php" ;
    }else{
        $pathImage ="message.php";
    }
    ?>
    <form action="<?=$pathImage?>" method="get">
        <input type="text" name="search-mes" class="text-input" placeholder="Поиск...">
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