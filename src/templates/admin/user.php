<form action="" method="post" >
    
    <div class="form-group row<?php echo $flash['error.name'] ? ' has-danger' : '' ?>">
        <label for="name" class="col-2 col-form-label">Name</label>
        <div class="col-10">
            <input class="form-control" type="text" name="name" value="<?php echo isset($data['name']) ? $data['name'] : ""; ?>" id="name" >
            <div class="form-control-feedback"><?php echo $flash['error.name']; ?></div>
        </div>
    </div>
    
    <div class="form-group row<?php echo $flash['error.email'] ? ' has-danger' : '' ?>">
        <label for="email" class="col-2 col-form-label">Email</label>
        <div class="col-10">
            <input class="form-control" type="text" name="email" value="<?php echo isset($data['email']) ? $data['email'] : ""; ?>" id="email" >
            <div class="form-control-feedback"><?php echo $flash['error.email']; ?></div>
        </div>
    </div>
    
    <div class="form-group row<?php echo $flash['error.username'] ? ' has-danger' : '' ?>">
        <label for="username" class="col-2 col-form-label">Username</label>
        <div class="col-10">
            <input class="form-control" type="text" name="username" value="<?php echo isset($data['username']) ? $data['username'] : ""; ?>" id="username" >
            <div class="form-control-feedback"><?php echo $flash['error.username']; ?></div>
        </div>
    </div>
    
    <div class="form-group row<?php echo $flash['error.password'] ? ' has-danger' : '' ?>">
        <label for="password" class="col-2 col-form-label">Password</label>
        <div class="col-10">
            <input class="form-control" type="password" name="password" id="password" >
            <div class="form-control-feedback"><?php echo $flash['error.password']; ?></div>
        </div>
    </div>
    
    <div class="form-group row">
        <div class="col-5 offset-2">
            <button class="btn btn-primary" type="submit" >Save</button>
            <a href="/admin/users" >Cancel</a>
        </div>
        <div class="col-5 text-right">
            <?php if (isset($data['id'])) { ?>
            <a class="btn btn-danger" href="/admin/users/delete/<?php echo $data['id']; ?>" >Delete</a>
            <?php } ?>
        </div>
    </div>
    
</form>
