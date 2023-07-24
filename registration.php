<?php
require 'config.php';
if(!empty($_SESSION["id"])){
  header("Location: index.php");
}
if(isset($_POST["submit"])){
  $name = $_POST["Name"];
  $username = $_POST["Username"];
  $email = $_POST["Email"];
  $password = $_POST["Password"];
  $confirmpassword = $_POST["confirmpassword"];
  $duplicate = mysqli_query($conn, "SELECT * FROM users WHERE Username = '$username' OR Email = '$email'");
  if(mysqli_num_rows($duplicate) > 0){
    echo
    "<script> alert('Username or Email Has Already Taken'); </script>";
  }
  else{
    if($password == $confirmpassword){
      $query = "INSERT INTO users VALUES('', '$name','$username','$email','$password')";
      mysqli_query($conn, $query);
      echo
      "<script> alert('Registration Successful'); </script>";
    }
    else{
      echo
      "<script> alert('Password Does Not Match'); </script>";
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Registration</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <h1>Registration</h1>
    <br><br><br><br>
    <div>
      <form class="" action="" method="post">
        <label for="Name">Name : </label>
        <input type="text" name="Name" id = "Name" required value="" placeholder="Enter Name"> <br>
        <label for="Username">Username : </label>
        <input type="text" name="Username" id = "Username" required value="" placeholder="Enter Username"> <br>
        <label for="Email">Email : </label>
        <input type="email" name="Email" id = "Email" required value="" placeholder="Enter Valid Email"> <br>
        <label for="Password">Password : </label>
        <input type="password" name="Password" id = "Password" required value="" placeholder="Enter Password"> <br>
        <label for="confirmpassword">Confirm Password : </label>
        <input type="password" name="confirmpassword" id = "confirmpassword" required value="" placeholder="Re-enter Password"> <br>
        <button type="submit" name="submit">Register</button>
      </form>
    </div>
    <br>
    Already Registered?  <a href="index.php">Login</a>
  </body>
</html>