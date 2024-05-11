<div class="container edit-user post row">
    <form class="row row justify-content-center" method="post" action="registration.php">
        <div class="row mb-3 col-10 col-md-6">
            <div class="mb-3 col-10 col-md-6">
                <label for="formGroupExampleInput" class="form-label">ID</label>
                <input name="id" value="<?= $username ?>" type="text" class="form-control" id="formGroupExampleInput">
            </div>
            <div class="w-100"></div>
            <div class="mb-3 col-10 col-md-6">
                <label for="exampleInputEmail1" class="form-label">ID sub</label>
                <input name="idSub" value="<?= $email ?>" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="w-100"></div>
            <div class="mb-3 col-10 col-md-6">
                <button type="submit" class="btn btn-primary" name="submit-sub">Подписаться</button>
            </div>
            <div class="mb-3 col-10 col-md-6">
                <button type="submit" class="btn btn-primary" name="submit-noSub">Отписаться</button>
            </div>
        </div>
    </form>
</div>
<div class="row title-table post">
    <div class="col-1">ID</div>
    <div class="col-3">Пользователь</div>
    <div class="col-2">ID sub</div>
    <div class="col-3">Подписчик</div>
    <div class="col-1">delete</div>
</div>
<div class="row post">
    <div class="col-1">1</div>
    <div class="col-3">user1</div>
    <div class="col-2">2</div>
    <div class="col-3">user2</div>
    <div class="col-1"><a href="#">delete</a></div>
</div>