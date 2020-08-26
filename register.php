<?php include('server.php'); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Php and Sql</title>
    </head>
<body>
    <div class="header">
        <h2>REGISTER</h2>
    </div>
    <form method="post" action="register.php">

        <!--display validation error here-->
        <?php include('errors.php');?>

        <div>
            <label>Username</label>
            <input type="text" name="username" value="<?php echo $username; ?>">
        </div>
        <div>
            <label>Email</label>
            <input type="text" name="email" value="<?php echo $email; ?>">
        </div>
        <div>
            <label>Password</label>
            <input type="password" name="password_1">
        </div>
        <div>
            <label>Confirm Password</label>
            <input type="password" name="password_2">
        </div>
        <div>
            <button type="submit" name="register" class="btn">Register</button>
        </div>
        <p>
            Already a member? <a href="login.php">Sign in</a>
        </P>
    </form>
</body>
</html>