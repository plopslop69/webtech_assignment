<?php
require 'config.php';
if(isset($_POST["submit"])){
  $usernameemail = $_POST["usernameemail"];
  $password = $_POST["password"];
  $result = mysqli_query($conn, "SELECT * FROM users WHERE Username = '$usernameemail' OR Email = '$usernameemail'");
  $row = mysqli_fetch_assoc($result);
  if(mysqli_num_rows($result) > 0){
    if($password == $row['Password']){
      $_SESSION['login'] = true;
      $_SESSION['id'] = $row["id"];
      echo 
        "<script src='loggedin.js' defer></script>";
    }
    else{
      echo
      "<script> alert('Wrong Password'); </script>";
    }
  }
  else{
    echo
    "<script> alert('User Not Registered'); </script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
    <script>
      const username = "<?php echo $row['Name']; ?>"
    </script>
  </head>
  <body>
    <div id="login">
      <h1>Login</h1>
      <br><br><br><br>
      <form class="" action="" method="post" autocomplete="off" id="myform">
        <label for="usernameemail">Username / Email</label>
        <input type="text" placeholder="Enter Username or Email" name="usernameemail" id = "usernameemail" required value=""> <br>
        <label for="password">Password</label>
        <input type="password" name="password" id = "password" placeholder="Enter Password" required value=""> <br>
        <button type="submit" name="submit">Login</button>
      </form>
      <br>
      Haven't registered yet?  <a href="registration.php">Registration</a>
    </div>
    <div id="home">
    </div>
  </body>
</html>