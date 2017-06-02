
<div class="row" >
    <div class="col-12" >
        <a class="btn btn-primary" href="/posts/create" >New</a>
    </div>
</div>

<br>

<div class="row" >
    <div class="col-12" >
        <table class="table table-bordered table-hover">

            <thead>
                <tr>
                    <th>Title</th>
                    <th>User</th>
                    <th>Created</th>
                    <th>Updated</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($posts as $post) { ?>
                <tr>
                    <td>
                        <a href="/posts/edit/<?php echo $post['id']; ?>">
                            <?php echo $post['title']; ?>
                        </a>
                    </td>
                    <td><?php echo $post['user_id']; ?></td>
                    <td><?php echo $dateHelper($post['created_at']); ?></td>
                    <td><?php echo $dateHelper($post['updated_at']); ?></td>
                </tr>
                <?php } ?>
            </tbody>

        </table>
    </div>
</div>
