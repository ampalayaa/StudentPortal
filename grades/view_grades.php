<?php

include_once("../connections/connection.php");
$con = connection();

// Fetch Grades Data
$sql_grades = "
    SELECT 
        CONCAT(s.firstname, ' ', s.lastname) AS student_name,
        g.course_code,
        sl.subject_name,
        g.grade,
        g.status,
        g.remarks,
        g.added_at,
        g.updated_at
    FROM Grades g
    JOIN Student s ON g.student_id = s.id
    JOIN subject_list sl ON g.course_code = sl.subject_code;
";
$grades = $con->query($sql_grades);

if (!$grades) {
    die("Error fetching grades: " . $con->error);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
    <link rel="stylesheet" href="css\style.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container my-5">
        <h1 class="text-center text-primary mb-4">Student Management System</h1>
        <br/>
        <br/>
        <a href="add_grades.php">Add New Grades</a>

        <!-- Grades Table -->
        <h2 class="text-secondary mt-5">Grades</h2>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr class="text-center">
                        <th>Student Name</th>
                        <th>Course Code</th>
                        <th>Subject Name</th>
                        <th>Grade</th>
                        <th>Status</th>
                        <th>Remarks</th>
                        <th>Date Added</th>
                        <th>Last Updated</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($grade = $grades->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo htmlspecialchars($grade['student_name']); ?></td>
                        <td><?php echo htmlspecialchars($grade['course_code']); ?></td>
                        <td><?php echo htmlspecialchars($grade['subject_name']); ?></td>
                        <td><?php echo htmlspecialchars($grade['grade']); ?></td>
                        <td><?php echo htmlspecialchars($grade['status']); ?></td>
                        <td><?php echo htmlspecialchars($grade['remarks']); ?></td>
                        <td><?php echo htmlspecialchars($grade['added_at']); ?></td>
                        <td><?php echo htmlspecialchars($grade['updated_at']); ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
?>