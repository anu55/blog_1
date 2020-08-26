<?php

$servername = "localhost";
$username = "root";
$password = "mysql";
$db="blog";
$hasError = false;
$conn = new mysqli($servername, $username, $password, $db);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$blog_title	 = $blog_post = $created_by = $address = "";
$blog_titleErr = $blog_postErr = $created_byErr = $addressErr = "";

function test_input($data)
{
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
// var_dump($_SERVER['REQUEST_METHOD']);exit;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["blog_title	"])) {
        $hasError= true;
      $blog_titleErr = "blog_title	 is required";
    } 
    else {
      $blog_title	 = test_input($_POST["blog_title	"]);
      if (!preg_match("/^[a-zA-Z]*$/",$blog_title	)) {
        $hasError= true;
        $blog_titleErr = "Only letters are allowed";
    }
    }
  
    if (empty($_POST["blog_post"])) {
        $hasError= true;
      $blog_postErr = "blog_post is required";
    } 
    else {
      $blog_post = test_input($_POST["blog_post"]);
      if (!preg_match("/^[a-zA-Z]*$/",$blog_post)) {
        $hasError= true;
        $blog_postErr = "Only letters are allowed";
    }
    }
  
    if (empty($_POST["created_by"])) {
        $hasError= true;
      $created_byErr = "created_by field is empty";
    } 
    else {
      $created_by = test_input($_POST["created_by"]);
      if (!preg_match("/^[a-zA-Z ]*$/",$created_by)) {
        $hasError= true;
        $created_byErr = "Only letters and white space allowed";
    }
    }
   if($hasError){
    echo 'validation error encounterd.';
   }
}

if(!$hasError){
    $sql = "INSERT INTO metadata (blog_title	,blog_post,created_by,address) 
        VALUES('".$blog_title	."','".$blog_post."','".$created_by."','".$address."');";
                // echo $sql;exit;
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
          } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
          }
} 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body bgcolor="lightblue" ;>
   <center><h1 style="background-color:Gray;">CREATE A NEW BLOG</h1></center>
    <form method="post" action="">
    <center>
        Blog Title: <input type="text" name="blog_title	">
        <span class="error">* <?php echo $blog_titleErr;?></span>
        <br><br>
        Blog Post: <input type="text" name="blog_post">
        <span class="error">* <?php echo $blog_postErr;?></span>
        <br><br>
        Created by:
        <input type="text" name="created_by">
        <span class="error">* <?php echo $created_byErr;?></span>
        <br><br>
        Address:
        <input type="text" name="address">
        <span class="error"><?php echo $addressErr;?></span>
        <br><br>
        <input type="submit" name="submit" value="Submit" href="admin.php">
    </center>
</body>
</html>