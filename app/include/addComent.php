<div class="post row ">
    <form action="" method="post">
        <input type="hidden" name="post_id" value="<?= $postId; ?>">
        <div class="mb-3">
            <label for="content" class="form-label"></label>
            <textarea name="textComment" class="form-control" id="content" rows="3" placeholder="Текст комментария"></textarea>
        </div>
        <div class="col-12">
            <button name="submitAddCom" class="btn btn-primary" type="submit">Добавить комментарий</button>
        </div>
    </form>
</div>