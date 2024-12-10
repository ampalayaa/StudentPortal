<?php

if (!isset($_SESSION)){
    session_start();
}

include_once("connections\connection.php");
$con = connection();

if (isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
    $user = $con->query($sql) or die ($con->error);
    $row = $user->fetch_assoc();
    $total = $user->num_rows;

    if($total > 0){
        $_SESSION['UserLogin'] = $row['username'];
        $_SESSION['Access'] = $row['role'];
        echo header("Location: index.php");
    }else{
        echo "No user found";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
</head>
<body>
    <h2>Login Page</h2>
    <br/>
    <form action="" method="post">
        <label>Username</label>
        <input type="text" name="username" id="username">
        <label>Password</label>
        <input type="password" name="password" id="password">
        <button type="submit" name="login">Login</button>
    </form>
</body>
</html>