<?php include ('server.php') ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Php and Sql</title>
</head>
<body>
    <div class="header">
        <h2>Home Page</h2>
    </div>
    
    <div class="content">
        <?php if (isset($_SESSION['success'])): ?>
            <div class="error success">
                <h3>
                    <?php
                    echo $_SESSION['success'];
                    unset($_SESSION['success']);
                    ?>
            </div>
        <?php endif ?>

        <?php if (isset($_SESSION["username"])): ?>
            <p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
            <p><a href="index.php?logout='1'" style="color: red;">Logout</a></p>
        <?php endif ?>
        <div>
        <button><h1><p><a href="index.php?writeablog='1'" style="color:green;">Write a new blog</a></p></h1></button>
        </div>
    </div>
</body>
</html>