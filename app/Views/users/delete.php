<div class="container-fluid text-center pt-5">
    <h2 class="pb-3">Do you really want to delete this user?</h2>
    <form action="/delete" method="post">
        <?= csrf_field() ?>
        <input name="id" value="<?= $id ?>" hidden>
        <button class="btn btn-danger" type="submit">Delete</button>
        <a href="/edit/<?= $id ?>" class="btn btn-success">Cancel</a>
        <a href="/list" class="btn btn-dark">Back to list</a>
    </form>
</div>