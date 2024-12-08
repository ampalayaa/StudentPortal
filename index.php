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
        <h1 class="text-center text-primary mb-4">Student Management System</h1>

        <div class="row">
            <!-- Students Section -->
            <div class="col-md-6">
                <h2 class="text-secondary mb-3">Manage Students</h2>
                <div class="list-group">
                    <a href="students\view_students.php" class="list-group-item list-group-item-action">View All Students</a>
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

            
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
?>