<!DOCTYPE html>
<html lang="bg">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Administration panel</title>
        <link rel="stylesheet" href="/node_modules/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="/assets/css/styles.css">
    </head>
    <body>
        
        <header>

            <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand" href="/">Administration panel</a>
                
                <?php if($isLoggedIn) { ?>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item<?php echo $isCurrentRoute('/posts') ? ' active' : '' ?>">
                            <a class="nav-link" href="/posts" >Posts</a>
                        </li>
                        <li class="nav-item<?php echo $isCurrentRoute('/users') ? ' active' : '' ?>">
                            <a class="nav-link" href="/users" >Users</a>
                        </li>
                    </ul>
                    
                    <?php if($isLoggedIn) { ?>
                    <span>Welcome, <?php echo $user['name']; ?></span>
                    <a class="logout" href="/logout" >logout</a>
                    <?php } ?>
                    
                </div>
                <?php } ?>
            </nav>
        </header>

        <br>
        <div class="container" >
            
            <?php if($flash['error']) { ?>
            <div class="alert alert-danger" role="alert">
                <strong>Error!</strong> <?php echo $flash['error']; ?>
            </div>
            <?php } ?>
            
            <?php if($flash['success']) { ?>
            <div class="alert alert-success" role="alert">
                <strong>Success!</strong> <?php echo $flash['success']; ?>
            </div>
            <?php } ?>
            
            <?php echo isset($content) ? $content : ''; ?>
        </div>

    </body>
</html>

