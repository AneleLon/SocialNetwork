<div class="section search">
    <h3>Поиск</h3>
    <form action="userProfile.php" method="get">
        <input type="hidden" name="id" value="<?= $info['id_users'];?>">
        <input type="text" name="search-profile" class="text-input" placeholder="Поиск...">
    </form>

    <script>
        const searchInput = document.querySelector('input[name="search-profile"]'); 
        searchInput.addEventListener('keydown', function(event) {
            if (event.key === 'Enter') {
                this.form.submit(); // Отправка формы
            }
        });
    </script>
</div>