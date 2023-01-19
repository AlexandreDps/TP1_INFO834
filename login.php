<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
</head>
<body>
  <form action="login.php" method="post">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username">
    <br>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password">
    <br><br>
    <input type="submit" value="Login">
  </form> 
</body>
</html>

<?php
  if ($_POST["username"] & $_POST["password"]) {
    $username =  $_POST["username"];
    $password = $_POST["password"];
    $output = shell_exec("python TP1_bdd.py $username");
    echo utf8_encode($output);
  }
?>
