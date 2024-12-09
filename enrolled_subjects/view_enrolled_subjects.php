<?php
include_once("../connections/connection.php");

$con = connection();

//fetch enrolled siubjects of student
$sql_enrolled_subjects = "SELECT * FROM enrolled_subject";
$enrolled_subjects = $con->query($sql_enrolled_subjects);

if (!$enrolled_subjects) {
    die("Error fetching enrolled_subjects: ". $con->error);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enrolled Subjects</title>
    <link rel="stylesheet" href="csss/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container my-5">
        <a href="add_enrolled_subjects.php">Enroll Student</a>

        <!-- Students Table -->
        <h2 class="text-secondary mt-4">Enrolled Subjects</h2>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr class="text-center">
                        <th>Course Code</th>
                        <th>Student ID</th>
                        <th>Semester</th>
                        <th>Academic Year</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $enrolled_subjects->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['course_code']); ?></td>
                        <td><?php echo htmlspecialchars($row['student_id']); ?></td>
                        <td><?php echo htmlspecialchars($row['semester']); ?></td>
                        <td><?php echo htmlspecialchars($row['academic_year']); ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
