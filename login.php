<?php

include_once("connections\connection.php");

$con = connection();

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
    <label>Username</label>
    <input type="text" name="username" id="username">
    <label>Password</label>
    <input type="password" name="password" id="password">
    <button type="submit" name="login">Login</button>
</body>
</html>