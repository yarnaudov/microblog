
<div class="row" >
    <div class="col-12" >
        <a class="btn btn-primary" href="/users/create" >New</a>
    </div>
</div>

<br>

<div class="row" >
    <div class="col-12" >
        <table class="table table-bordered table-hover">

            <thead>
                <tr>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Created</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($users as $user) { ?>
                <tr>
                    <td>
                        <a href="/users/edit/<?php echo $user['id']; ?>">
                            <?php echo $user['name']; ?>
                        </a>
                    </td>
                    <td><?php echo $user['username']; ?></td>
                    <td><?php echo $user['email']; ?></td>
                    <td><?php echo $dateHelper($user['created_at']); ?></td>
                </tr>
                <?php } ?>
            </tbody>

        </table>
    </div>
</div>
