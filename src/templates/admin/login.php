<form action="" method="post" >
    
    <div class="form-group row<?php echo $flash['error.username'] ? ' has-danger' : '' ?>">
        <label for="title" class="col-2 offset-3 col-form-label">Username</label>
        <div class="col-4">
            <input class="form-control" type="text" placeholder="Username" name="username" >
            <div class="form-control-feedback"><?php echo $flash['error.username']; ?></div>
        </div>
    </div>
    
    <div class="form-group row<?php echo $flash['error.password'] ? ' has-danger' : '' ?>">
        <label for="title" class="col-2 offset-3 col-form-label">Password</label>
        <div class="col-4">
            <input class="form-control" type="text" placeholder="Password" name="password" >
            <div class="form-control-feedback"><?php echo $flash['error.password']; ?></div>
        </div>
    </div>
    
    <div class="form-group row">
        <div class="col-4 offset-5">
            <button class="btn btn-primary" type="submit" >Login</button>
        </div>
    </div>
    
</form>