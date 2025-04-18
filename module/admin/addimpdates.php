<?php
include_once('main.php');
include_once ('../../service/mysqlcon.php');
?>
<!DOCTYPE html>
<html>
<head><title>Add Dates</title>
<link rel="stylesheet" href="des.css">
<style>
    div {
        width: 50%;
        border-radius: 5px;
        background-color: darkseagreen;
        padding: 20px;
        margin: auto;
    }

    input[type=submit] {
        width: 20%;
        background-color: darkblue;
        color: azure;
        padding: 14px 20px;
        margin: auto;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        display: block;
        text-align: center;
    }

    input[type=submit]:hover {
        background-color: darkslateblue;
        transition: background-color 0.8s;
    }
</style>
</head>
<body>
    <center><h1>Add Important Dates</h1></center>

    <form action="#" method="post" enctype="multipart/form-data">
        <div>
            Enter Faculty ID:
            <input type="text" placeholder="Enter Faculty ID" name="fid" required>
            Enter Date:
            <input type="date" name="date" required>
            Enter Subject:
            <input type="text" placeholder="Write Something" name="subject" required>
            <br><br>
            <input id="submit" type="submit" name="submit" value="Submit">
        </div>
    </form>

<?php
if (!empty($_POST['submit'])) {
    $FacID = $_POST['fid'];
    $Date = $_POST['date'];
    $Subject = $_POST['subject'];

    // Check if Faculty ID exists
    $checkFacultyQuery = "SELECT * FROM faculty WHERE id = '$FacID'";
    $facultyResult = mysqli_query($link, $checkFacultyQuery);

    if (mysqli_num_rows($facultyResult) > 0) {
        // Faculty exists, insert data
        $insertQuery = "INSERT INTO importantdates VALUES('$FacID', '$Date', '$Subject')";
        $success = mysqli_query($link, $insertQuery);

        if (!$success) {
            echo '<script>alert("Error: Could not enter data.");</script>';
        } else {
            echo '<script>alert("Data Entered Successfully");</script>';
        }
    } else {
        // Faculty ID doesn't exist
        echo '<script>alert("The Faculty ID does not exist.");</script>';
    }
}
?>
</body>
</html>
