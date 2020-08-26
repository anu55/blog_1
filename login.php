<?php include('server.php'); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Php and Sql</title>
</head>
<body>
    <div class="header">
        <h2>LOGIN</h2>
    </div>
    <form method="post" action="login.php">
        <!--display validation error here-->
        <?php include('errors.php');?>
        <div>
            <label>Username</label>
            <input type="text" name="username">
        </div>
        <div>
            <label>Password</label>
            <input type="password" name="password_1">
        </div>
        <div>
            <button type="submit" name="login" class="btn">Login</button>
        </div>
        <p>
           Not yet a member? <a href="register.php">Sign up</a>
        </P>
    </form>
</body>
</html>