<?php
include_once("../connections/connection.php");
$con = connection();

if (isset($_POST['submit'])) {
    $course_code = $_POST['course_code'];
    $course_name = $_POST['course_name'];
    $units = $_POST['units'];

    if (!empty($course_code) && !empty($course_name) && !empty($units)) {
        $sql = "INSERT INTO `subject_list` (`subject_code`, `subject_name`, `units`) 
        VALUES ('$course_code', '$course_name', '$units')";

        if ($con->query($sql) === TRUE) {
            header("Location: view_subjects.php"); 
            exit(); 
        } else {
            echo "Error: " . $sql . "<br>" . $con->error;
        }
    } else {
        echo "Course code, course name, and number of units are required!";
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
        <label>Course Code</label>
        <input type="text" name="course_code" id="course_code" required>

        <label>Course Name</label>
        <input type="text" name="course_name" id="course_name" required>

        <label>Units</label>
        <input type="number" name="units" id="units" required>

        <input type="submit" name="submit" value="Submit Form">
    </form>
</body>
</html>
