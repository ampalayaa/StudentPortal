<?php

include_once("../connections/connection.php");
$con = connection();

if (isset($_POST['submit'])) {
    // Retrieve data from the form
    $course_code = $_POST['course_code'];
    $student_id = $_POST['student_id'];
    $grade = $_POST['grade'];
    $status = $_POST['status'];
    $remarks = $_POST['remarks'];
    $added_at = $_POST['added_at'];
    $updated_at = $_POST['updated_at'];

    // Validate input (ensure required fields are not empty)
    if (!empty($course_code) && !empty($student_id) && !empty($grade)) {
        // SQL query to insert grade data into the grades table
        $sql = "INSERT INTO `grades` (`course_code`, `student_id`, `grade`, `status`, `remarks`, `added_at`, `updated_at`) 
                VALUES ('$course_code', '$student_id', '$grade', '$status', '$remarks', '$added_at', '$updated_at')";

        if ($con->query($sql) === TRUE) {
            // Redirect to index.php after successful insertion
            header("Location: view_grades.php");
            exit(); // Stop further script execution
        } else {
            echo "Error: " . $sql . "<br>" . $con->error;
        }
    } else {
        echo "Course Code, Student ID, and Grade are required!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <form action="" method="post">
        <!-- Course Code -->
        <label>Course Code</label>
        <input type="text" name="course_code" id="course_code" required>

        <!-- Student ID -->
        <label>Student ID</label>
        <input type="number" name="student_id" id="student_id" required>

        <!-- Grade -->
        <label>Grade</label>
        <input type="text" name="grade" id="grade" required>

        <!-- Status -->
        <label>Status</label>
        <select name="status" id="status">
            <option value="Passed">Passed</option>
            <option value="Failed">Failed</option>
            <option value="Incomplete">Incomplete</option>
        </select>

        <!-- Remarks -->
        <label>Remarks</label>
        <input type="text" name="remarks" id="remarks">

        <!-- Date Added -->
        <label>Date Added</label>
        <input type="date" name="added_at" id="added_at">

        <!-- Date Updated -->
        <label>Date Updated</label>
        <input type="date" name="updated_at" id="updated_at">

        <!-- Submit Button -->
        <input type="submit" name="submit" value="Submit Form">
    </form>
</body>
</html>
