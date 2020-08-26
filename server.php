<?php
    session_start();

    $username = "";
    $email = "";
    $errors = array();

    //connect to database
    $db = new mysqli('localhost', 'root', 'mysql','blog');

    //if registration button is clicked
    if (isset($_POST['register'])){
            $username = $db -> real_escape_string($_POST['username']);
            $email = $db -> real_escape_string($_POST['email']);
            $password_1 = $db -> real_escape_string($_POST['password_1']);
            $password_2 = $db -> real_escape_string($_POST['password_2']);

        //validate
        if (empty($username)){
            array_push($errors,"Username is required");
        }
        if (empty($email)){
            array_push($errors,"Email is required");
        }
        if (empty($password_1)){
            array_push($errors,"Password is required");
        }
        if (empty($password_2)){
            array_push($errors,"Password is required");
        }

        if($password_1 != $password_2) {
            array_push($errors, "The two passwords do no match");
        }

        //if there are no errors, save user to database
        if (count($errors) == 0) {
            $password = md5($password_1); //encrypt password before storing in database
        
            $sql ="INSERT INTO bloglogininfo (username, email, password) 
                    VALUES ('$username','$email','$password')";
            
            // $data = mysqli_query($db,$sql);
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "";
            
            $result = mysqli_query($db, $sql);
            if (mysqli_num_rows($result) == 1){

                //log user in 
                $_SESSION['username'] = $username;
                $_SESSION['success'] = "";
                header('location: index.php'); //redirect to home page
             }
             else{
                 array_push($errors, "Wrong username/password combination");
                 header ('location: index.php');

             }
        }


    }
    //log user in from login page
    if (isset($_POST['login'])){
        $username = $db ->real_escape_string($_POST['username']);
        $password = $db -> real_escape_string($_POST['password_1']);

        //validate
        if (empty($username)){
            array_push($errors,"Username is required");
        }
        if (empty($password)){
            array_push($errors,"Password is required");
        }
         if (count($errors) == 0){
             $password = md5($password);//encrypt password
             $query = "SELECT * from bloglogininfo WHERE username='$username' AND password='$password'";
             $result = mysqli_query($db, $query);
             if (mysqli_num_rows($result) == 1){

                //log user in 
                $_SESSION['username'] = $username;
                $_SESSION['success'] = "";
                header('location: index.php'); //redirect to home page
             }
             else{
                 array_push($errors, "Wrong username/password combination");
                 header ('location: login.php');

             }


             }
         }


    //logout
    if (isset($_GET['logout'])){
        session_destroy();
        unset($_SESSION['username']);
        header('location: login.php');
    }
    //writeanewblogpost
    if (isset($_GET['writeablog'])){
        header("Location: http://localhost/blog_1/blogpost.php");
    }
    
    
?>