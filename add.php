<?php
include_once("connections/connection.php");
$con = connection();

if (isset($_POST['submit'])) {
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $extension = $_POST['extension'];
    $gender = $_POST['gender'];
    $birthdate = $_POST['birthdate'];
    $program = $_POST['program'];
    $year_level = $_POST['year_level'];
    $user_id = $_POST['user_id'];
    $department_id = $_POST['department_id'];

    if (!empty($firstname) && !empty($lastname)) {
        $sql = "INSERT INTO `student` (`firstname`, `middlename`, `lastname`, `extension`, `gender`, 
        `birthdate`, `program`, `year_level`, `user_id`, `department_id`) 
        VALUES ('$firstname', '$middlename', '$lastname', '$extension', '$gender',  
        '$birthdate', '$program', '$year_level', '$user_id', '$department_id')";

        if ($con->query($sql) === TRUE) {
            header("Location: index.php"); // Redirect to index.php
            exit(); // Stop further script execution
        } else {
            echo "Error: " . $sql . "<br>" . $con->error;
        }
    } else {
        echo "First Name and Last Name are required!";
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
        <label>First Name</label>
        <input type="text" name="firstname" id="firstname" required>

        <label>Middle Name</label>
        <input type="text" name="middlename" id="middlename">

        <label>Last Name</label>
        <input type="text" name="lastname" id="lastname" required>

        <label>Extension</label>
        <input type="text" name="extension" id="extension">

        <label>Gender</label>
        <select name="gender" id="gender">
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Non-binary">Non-binary</option>
        </select>

        <label>Birthdate</label>
        <input type="date" name="birthdate" id="birthdate">

        <label>Program</label>
        <input type="text" name="program" id="program">

        <label>Year Level</label>
        <select name="year_level" id="year_level">
            <option value="First Year">First Year</option>
            <option value="Second Year">Second Year</option>
            <option value="Third Year">Third Year</option>
            <option value="Fourth Year">Fourth Year</option>
        </select>

        <label>Department ID</label>
        <input type="number" name="department_id" id="department_id">

        <label>User ID</label>
        <input type="number" name="user_id" id="user_id">

        <input type="submit" name="submit" value="Submit Form">
    </form>
</body>
</html>
