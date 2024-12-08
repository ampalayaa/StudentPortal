<?php

include_once("..\connections\connection.php");

$con = connection();

// Fetch Students Data
$sql_subjects = "SELECT * FROM subject_list";
$subjects = $con->query($sql_subjects);

if (!$subjects) {
    die("Error fetching subjects: " . $con->error);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subject List</title>
    <link rel="stylesheet" href="css\style.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container my-5">
        <h1 class="text-center text-primary mb-4">Student Management System</h1>
        <br/>
        <br/>
        <a href="add_subjects.php">Add New Subject</a>

        <!-- Students Table -->
        <h2 class="text-secondary mt-4">Subjects</h2>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr class="text-center">
                        <th>Course Code</th>
                        <th>Course Name</th>
                        <th>Units</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $subjects->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['subject_code']); ?></td>
                        <td><?php echo htmlspecialchars($row['subject_name']); ?></td>
                        <td><?php echo htmlspecialchars($row['units']); ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
