<!DOCTYPE html>
<html lang="bg">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Administration panel</title>
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
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/posts" >Posts</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/users" >Users</a>
                        </li>
                    </ul>
                    
                    <?php if($isLoggedIn) { ?>
                        <?php echo $user['name']; ?>
                        <a href="/admin/logout" >Logout</a>
                        <?php } ?>
                    
                </div>
                <?php } ?>
            </nav>
        </header>

        <?php echo $flash['error']; ?>
        
        <br>
        <div class="container" >
            <?php echo isset($content) ? $content : ''; ?>
        </div>

    </body>
</html>

