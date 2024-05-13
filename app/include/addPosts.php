<div class="post row add-post">
    <form action="index.php" method="post">
        <div class="mb-3">
            <label for="content" class="form-label"></label>
            <textarea name="textPost" class="form-control" id="content" rows="3" placeholder="Текст поста"></textarea>
        </div>
        <div class="mb-3">
            <label for="formFileSm" class="form-label"></label>
            <input name="image" class="form-control form-control-sm" id="formFileSm" type="file">
        </div>
        <div class="col-12">
            <button name="submitAddPost" class="btn btn-primary" type="submit">Выложить пост</button>
        </div>
    </form>
</div>