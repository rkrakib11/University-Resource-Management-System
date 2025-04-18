<?php
include_once('main.php');
?>
<!DOCTYPE html>
<html>

<head>
    <title>Add Notice</title>
    <link rel="stylesheet" href="des.css">
    <style>
        div {
            width: 60%;
            border-radius: 5px;
            background-color: #4DD0E1;
            padding: 20px;
            margin: auto;

        }
        input[type=submit] {
            width: 20%;
            background-color:darkslateblue;
            color:beige;
            padding: 14px 20px;
            margin: auto;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            display: block;
            text-align: center;
        }

        input[type=text], select {
    width: 80%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

        input[type=submit]:hover {
            background-color:darkolivegreen;
            transition: background-color 0.8s;
        }

        body {
            background-color: black;
        }

        h1 {
            color: lightgoldenrodyellow;
        }
    </style>
</head>

<body>
    <center>
        <br><br>
        <a href="home.php">Home</a>
    </center>
    <br><br>
    <center>
        <h1>Upload Announcement</h1>
    </center>
    <br>
    <form action="#" method="post" enctype="multipart/form-data">
        <div>
            <input type="text" name="sub" id="subb" placeholder="Subject" required>
            <textarea rows="4" cols="50" name="cont" placeholder="Notice" required></textarea>
            <script>
                function myFunction() {
                    var x = document.getElementById("subb");
                    x.value = x.value.toUpperCase();
                }
            </script>
            <input type="submit" name="submit">
        </div>
</body>

</html>
<?php
include_once('../../service/mysqlcon.php');
if (!empty($_POST['submit'])) {
    $Sub = $_POST['sub'];
    $Content = $_POST['cont'];
    $today = date("Y-m-d");
    $sql = "INSERT into announcement values('$loged_user_name','$Sub','$today','$Content');";
    $success = mysqli_query($link, $sql);
    if (!$success) {
        die('Could not enter data ');
    }
    $message = "Successfully Uploaded";
    echo '<script type="text/javascript">alert("' . $message . '");</script>';
    echo "\n";
}
?>