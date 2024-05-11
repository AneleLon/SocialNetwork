<div class="container edit-user post row">
    <form class="row row justify-content-center" method="post" action="registration.php">
        <div class="row">
            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">idFrom</label>
                <input name="idFrom" value="<?= $username ?>" type="text" class="form-control" id="formGroupExampleInput">
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">idIN</label>
                <input name="idIn" value="<?= $username ?>" type="text" class="form-control" id="formGroupExampleInput">
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Сообщение</label>
                <textarea class="form-control" id="content" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary" name="submit-reg">Отправить</button>
            </div>
        </div>
    </form>
</div>
<div>
    <div class="row title-table post">
        <div class="row">ID message</div>
        <div class="row post">
            <div class="col-1">ID from</div>
            <div class="col-3">Username</div>
            <div class="col-2">ID in</div>
            <div class="col-3">Username</div>
            <div class="col-1"><a>edit</a></div>
            <div class="col-1"><a>delete</a></div>
        </div>
        <div class="row post">message
        </div>
    </div>

    <div class="row post">
        <div class="row">23</div>
        <div class="row post">
            <div class="col-1">1</div>
            <div class="col-3">Usern1</div>
            <div class="col-2">2</div>
            <div class="col-3">User2</div>
            <div class="col-1"><a href="#">edit</a></div>
            <div class="col-1"><a href="#">delete</a></div>
        </div>
        <div class="row post">Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta laborum, porro
            quisquam dignissimos blanditiis cumque architecto voluptate dolorum harum. Sed,
            asperiores iste reiciendis provident, optio ea quae ut reprehenderit quod dolor
            fuga deserunt. Ducimus enim dolor fugiat amet necessitatibus. Repudiandae inventore
            asperiores enim maxime quae iure ad aut quis harum?
        </div>
    </div>

</div>