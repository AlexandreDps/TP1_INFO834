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
    echo "test\n";
    echo $username;
    $number = 5;
    $path = __DIR__ . '/TP1_bdd.py';
    echo $path;

    $output = shell_exec("python TP1_bdd.py $number");
    echo $output;
  }
?>
