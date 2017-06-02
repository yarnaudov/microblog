<!DOCTYPE html>
<html lang="bg">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Administration panel</title>
        <link rel="stylesheet" href="assets/css/styles.css">
    </head>
    <body>
        
        <header>
            <div class="container" >
                <div class="row" >
                    <div class="col-sm-6" >
                        <h1>Administration panel</h1>
                    </div>
                    <div class="col-sm-6" >
                        <nav>
                            <ul>
                                <li>
                                    <a href="/admin/posts" >Posts</a>
                                </li>
                                <li>
                                    <a href="/admin/users" >Users</a>
                                </li>
                            </ul>
                        </nav>
                        <a href="/admin/logout" >Logout</a>
                    </div>
                </div>
            </div>
        </header>

        <?php echo $flash['error']; ?>

        <?php echo isset($content) ? $content : ''; ?>

    </body>
</html>

