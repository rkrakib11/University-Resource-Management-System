
<?php
include_once('main.php');
include_once('../../service/mysqlcon.php'); // Make sure database connection is included
?>
<!DOCTYPE html>
<html>

<head>
    <title>Delete Faculty</title>
    <link rel="stylesheet" href="des.css">
    <style>
        div {
            width: 30%;
            border-radius: 5px;
            background-color: darkslategrey;
            color: aliceblue;
            padding: 15px;
            margin: auto;
        }

        input[type=submit] {
            width: 30%;
            background-color:navy;
            color: white;
            padding: 18px 12px;
            margin: 25px auto;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            display: block;
            text-align: center;
        }
        input[type=submit]:hover {
            background-color:midnightblue;
            transition: background-color 0.8s;
        }
    </style>
</head>

<body>
    <center>
        <h1>Delete Faculty</h1>
    </center>
    <form action="#" method="post" enctype="multipart/form-data">
        <div>
            Enter Faculty ID:
            <input type="text" placeholder="Enter Faculty ID" name="fid" required>
            <br>
            <input type="submit" name="submit">
        </div>
    </form>
</body>

</html>

<?php
if (!empty($_POST['submit'])) {
    $facID = mysqli_real_escape_string($link, $_POST['fid']);

    // Check if the faculty exists
    $checkQuery = "SELECT * FROM faculty WHERE id='$facID'";
    $checkQuery = "SELECT * FROM users WHERE userid='$facID'";
    $checkResult = mysqli_query($link, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        // Faculty exists, delete from both 'faculty' and 'users' tables
        $deleteFaculty = "DELETE FROM faculty WHERE id='$facID'";
        $deleteUsers = "DELETE FROM users WHERE userid='$facID'";

        if (mysqli_query($link, $deleteFaculty) && mysqli_query($link, $deleteUsers)) {
            echo '<script>alert("Faculty ID deleted.");</script>';
        } else {
            echo '<script>alert("Error deleting Faculty ID: ' . mysqli_error($link) . '");</script>';
        }
    } else {
        echo '<script>alert("Faculty ID does not exist.");</script>';
    }
}
?>