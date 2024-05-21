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