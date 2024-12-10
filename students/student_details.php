<?php

if (!isset($_SESSION)){
    session_start();
}

if(isset($_SESSION['Access']) && $_SESSION['Access'] == 'admin'){
    echo "Welcome ".$_SESSION['UserLogin'];
} else{
    echo header("Location: ../index.php");
    exit();
}

include_once("connections\connection.php");

$con = connection();

$id = $_GET['ID'];

$sql = "SELECT * FROM student WHERE id = $id";
$students = $con->query($sql) or die(con->error);
$row = $students->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System - Dashboard</title>
    <link rel="stylesheet" href="css/style.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <h2><?php echo $row['firstname'];?> <?php echo $row['lastname'];?></h2>
</body>
</html>