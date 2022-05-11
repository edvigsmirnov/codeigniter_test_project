<div class="container-fluid">
    <h2>Create a new user</h2>
    <div>
        <form action="/create" method="post">
            <?= csrf_field() ?>
            <div class="row pb-3">
                <div class="col-3">
                    <input type="text" class="form-control" name="firstName" placeholder="Enter first name" required>
                </div>
            </div>
            <div class="row pb-3">
                <div class="col-3">
                    <input type="text" class="form-control" name="lastName" placeholder="Enter last name" required>
                </div>
            </div>
            <div class="row pb-3">
                <div class="col-3">
                    <input type="email" class="form-control" name="email" placeholder="Enter email address" required>
                </div>
            </div>
            <div class="row pb-4">
                <div class="col-3">
                    <select class="custom-select" name="role">
                        <option value="user" selected>User</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    <button class="btn btn-success" type="submit">Create new user</button>
                    <a href="/list" class="btn btn-dark">Back to list</a>
                </div>
            </div>
        </form>
    </div>
</div>

</div>

