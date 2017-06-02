<table>
    
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
                <a href="/admin/posts/edit/<?php echo $post['id']; ?>">
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

<a href="/admin/posts/create" >New</a>
