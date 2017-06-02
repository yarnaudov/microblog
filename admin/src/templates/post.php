<form action="" method="post" >
    
    <div class="form-group row<?php echo $flash['error.title'] ? ' has-danger' : '' ?>">
        <label for="title" class="col-2 col-form-label">Title</label>
        <div class="col-10">
            <input class="form-control" type="text" name="title" value="<?php echo isset($data['title']) ? $data['title'] : ""; ?>" id="title" >
            <div class="form-control-feedback"><?php echo $flash['error.title']; ?></div>
        </div>
    </div>
    
    <div class="form-group row<?php echo $flash['error.text'] ? ' has-danger' : '' ?>">
        <label for="text" class="col-2 col-form-label">Text</label>
        <div class="col-10">
            <textarea class="form-control" name="text" id="text" rows="10" ><?php echo isset($data['text']) ? $data['text'] : ""; ?></textarea>
            <div class="form-control-feedback"><?php echo $flash['error.text']; ?></div>
        </div>
    </div>
    
    <div class="form-group row">
        <div class="col-5 offset-2">
            <button class="btn btn-primary" type="submit" >Save</button>
            <a href="/posts" >Cancel</a>
        </div>
        <div class="col-5 text-right">
            <?php if (isset($data['id'])) { ?>
            <a class="btn btn-danger" href="/posts/delete/<?php echo $data['id']; ?>" >Delete</a>
            <?php } ?>
        </div>
    </div>
    
</form>
