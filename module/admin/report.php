<?php
include_once('main.php');
?>
<!DOCTYPE html>
<html>

<head>
    <title>Report</title>
    <link rel="stylesheet" href="des.css">
    <style>
        div {
            width: 70%;
            border-radius: 10px;
            background-color:#40b7ad;
            padding: 20px;
            margin: auto;
        }
        

        input[type=submit] {
            width: 15%;
            background-color: #1231aa;
            color: white;
            padding: 17px 20px;
            margin: 30px auto;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            display: block;
            text-align: center;
        }
        input[type=submit]:hover {
            background-color: mediumslateblue;
            transition: background-color 0.8s;
        }
    </style>
</head>

<body>
    <center>
        <h1>Report</h1>
    </center>
    </div>
    </div>
    <form action="#" method="post" enctype="multipart/form-data">
        <div>
            Date:
            <input type="date" name="date" placeholder="YYYY-MM-DD" required>
            Enter Faculty ID:
            <input type="text" name="fid" required>
            Enter Room Number:
            <input type="text" name="rnum" required>
            Message:
            <input type="text" name="report" required>
            <input id="submit" type="submit" name="submit" value="Submit">
        </div>
    </form>
</body>

</html>


<?php
include_once('../../service/mysqlcon.php');

if (!empty($_POST['submit'])) {
    $Date = $_POST['date'];
    $facID = $_POST['fid'];
    $roomNumber = $_POST['rnum'];
    $Report = $_POST['report'];

    // Check if Faculty ID exists
    $facultyQuery = "SELECT * FROM faculty WHERE id = '$facID'";
    $facultyResult = mysqli_query($link, $facultyQuery);

    // Check if Room Number exists
    $roomQuery = "SELECT * FROM room WHERE number = '$roomNumber'";
    $roomResult = mysqli_query($link, $roomQuery);

    if (mysqli_num_rows($facultyResult) > 0 && mysqli_num_rows($roomResult) > 0) {
        // Both exist, insert the report
        $sql = "INSERT INTO report VALUES('$Date','$facID','$roomNumber','$Report');";
        $success = mysqli_query($link, $sql);

        if (!$success) {
            echo '<script>alert("Error: Could not enter data.");</script>';
        } else {
            echo '<script>alert("Data Entered Successfully");</script>';
        }
    } else {
        // One or both don't exist
        echo '<script>alert("The user ID or room number doesn\'t exist.");</script>';
    }
}
?>
