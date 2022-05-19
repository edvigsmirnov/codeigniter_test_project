<div class="container-fluid">
    <h2>Edit user</h2>
    <div>
        <form action="/edit" method="post">
            <?= csrf_field() ?>
            <input type="hidden" name="id" value="<?php echo $user['id']?>">
            <div class="row pb-3">
                <div class="col-3">
                    <input type="text" class="form-control" name="firstName" placeholder="<?php echo $user['first_name']?>">
                </div>
            </div>
            <div class="row pb-3">
                <div class="col-3">
                    <input type="text" class="form-control" name="lastName" placeholder="<?php echo $user['last_name']?>">
                </div>
            </div>
            <div class="row pb-3">
                <div class="col-3">
                    <input type="email" class="form-control" name="email" placeholder="<?php echo $user['email']?>">
                </div>
            </div>
            <div class="row pb-4">
                <div class="col-3">
                    <select class="custom-select" name="role">
                        <option value="user" <?php if ($user['role'] === 'user'):?>selected<?php endif?>>User</option>
                        <option value="admin" <?php if ($user['role'] === 'admin'):?>selected<?php endif?>>Admin</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <button class="btn btn-success" type="submit">Save changes</button>
                    <a href="/list" class="btn btn-dark">Back to list</a>
                    <a class="btn btn-danger" href='/delete/<?= $user['id']?>'>Delete</a>
                </div>
            </div>
        </form>
    </div>
</div>

