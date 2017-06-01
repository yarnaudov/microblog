<table>
    
    <thead>
        <tr>
            <th>Title</th>
            <th>User</th>
            <th>Created</th>
        </tr>
    </thead>
    
    <tbody>
        <?php foreach ($posts as $post) { ?>
        <tr>
            <td>
                <a href="<?php echo $getUrl($post['id']); ?>">
                    <?php echo $post['title']; ?>
                </a>
            </td>
            <td><?php echo $post['user_id']; ?></td>
            <td><?php echo $dateHelper($post['created_at']); ?></td>
        </tr>
        <?php } ?>
    </tbody>
    
</table>

<a href="" >New</a>
