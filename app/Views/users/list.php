<div class="container-fluid">
    <h2><?= $title ?></h2>
    <?php if (empty($users) && !is_array($users)) { ?>
        <p>Unfortunately, there are no users. But you can <a href="/create">create one</a></p>
    <?php } else { ?>
        <a href="/create" class="btn btn-success btn">Create a new user</a>
        <div class="container pt-1"></div>
        <table class="table table-hover text-center">
            <thead class="thead-dark">
            <th></th>
            <?php foreach ($fields as $field_name) {
                echo "<th>$field_name</th>";
            } ?>
            </thead>
            <tbody>
            <?php foreach ($users as $user) {
                echo '<tr>';
                echo '<td><a href="/edit/' . $user['id'] . '" class="btn btn-dark btn-sm">Edit</a></td>';
                foreach ($user as $key => $value) {
                    echo "<td class='align-middle'>$value</td>";
                }
                echo '</tr>';
            } ?>
            </tbody>
        </table>
    <?php } ?>
</div>