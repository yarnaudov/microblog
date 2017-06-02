<form action="" method="post" >
    <input type="text" name="title" value="<?php echo isset($data['title']) ? $data['title'] : ""; ?>" >
    <textarea name="text" ><?php echo isset($data['text']) ? $data['text'] : ""; ?></textarea>
    <button type="submit" >Save</button>
    <a href="/admin/posts" >Cancel</a>
</form>
