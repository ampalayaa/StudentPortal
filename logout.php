<?php
session_start();
unset($_SESSION['UserLogin']);
unset($_SESSION['role']);
echo header("Location: index.php")
?>