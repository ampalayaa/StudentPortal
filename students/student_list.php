<?php

include_once("../connections/connection.php");
$con = connection();

// Fetch Students Data
$sql_students = "SELECT * FROM Student";
$students = $con->query($sql_students);

if (!$students) {
    die("Error fetching students: " . $con->error);
}

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
        <a href="student_add.php">Add New Student</a>

        <!-- Students Table -->
        <h2 class="text-secondary mt-4">Students</h2>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr class="text-center">
                        <th>First Name</th>
                        <th>Middle Name</th>
                        <th>Last Name</th>
                        <th>Extension</th>
                        <th>Gender</th>
                        <th>Birthdate</th>
                        <th>Program</th>
                        <th>Year Level</th>
                        <th>Action<th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $students->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['firstname']); ?></td>
                        <td><?php echo htmlspecialchars($row['middlename']); ?></td>
                        <td><?php echo htmlspecialchars($row['lastname']); ?></td>
                        <td><?php echo htmlspecialchars($row['extension']); ?></td>
                        <td><?php echo htmlspecialchars($row['gender']); ?></td>
                        <td><?php echo htmlspecialchars($row['birthdate']); ?></td>
                        <td><?php echo htmlspecialchars($row['program']); ?></td>
                        <td><?php echo htmlspecialchars($row['year_level']); ?></td>
                        <td><a href="student_details.php?ID=<?php echo $row['id'];?>">View Record</a></td>
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