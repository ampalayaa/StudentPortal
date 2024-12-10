<?php
if (!isset($_SESSION)){
    session_start();
}

if(isset($_SESSION['UserLogin'])){
    echo "Welcome ".$_SESSION['UserLogin'];
}else{
    echo "Welcome, Guest!";
}

include_once("connections\connection.php");

$con = connection();
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
    <div class="container my-5">
        <br/>
        <br/>
        <?php if(isset($_SESSION['UserLogin'])){?>
        <a href="logout.php">Logout</a>
        <?php } else{ ?>
             <a href="login.php">Login</a>
        <?php } ?>

        <div class="row">
            <!-- Students Section -->
            <div class="col-md-6">
                <h2 class="text-secondary mb-3">Manage Students</h2>
                <div class="list-group">
                    <a href="students\student_list.php" class="list-group-item list-group-item-action">View All Students</a>
                </div>
            </div>

            <!-- Grades Section -->
            <div class="col-md-6">
                <h2 class="text-secondary mb-3">Manage Subjects</h2>
                <div class="list-group">
                    <a href="subjects\view_subjects.php" class="list-group-item list-group-item-action">View All Subjects</a>
                </div>
            </div>

            <!-- Grades Section -->
            <div class="col-md-6">
                <h2 class="text-secondary mb-3">Manage Grades</h2>
                <div class="list-group">
                    <a href="grades\view_grades.php" class="list-group-item list-group-item-action">View All Grades</a>
                </div>
            </div>

                        <!-- Enrolled Subjects -->
            <div class="col-md-6">
                <h2 class="text-secondary mb-3">Enrolled Subjects</h2>
                <div class="list-group">
                    <a href="enrolled_subjects\view_enrolled_subjects.php" class="list-group-item list-group-item-action">View All Enrolled Subjects</a>
                </div>
            </div>

             
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>