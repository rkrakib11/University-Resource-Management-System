<?php
include_once('main.php');
?>
<!DOCTYPE html>
<html>

<head>
    <title>Change password</title>
    <link rel="stylesheet" href="des.css">
    <style>
        div {
            width: 30%;
            border-radius: 5px;
            color: aliceblue;
            padding: 15px;
            margin: auto;

        }

        .card {

            padding: 30px 20px;
            margin: 20px 50px;
            border-radius: 10px;
            background-color: #f2f2f2;


        }


        input[type=submit] {
            width: 30%;
            background-color: #1231aa;
            color: white;
            padding: 17px 13px;
            margin: 30px auto;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            display: block;
            text-align: center;
        }
        input[type=submit]:hover {
            background-color:darkblue;
            transition: background-color 0.8s;
        }

        h1 {
            color: aqua;
        }

        body {
            background-color: black;
        }
    </style>
</head>

<body>
    <br><br><br>
    <center><a href="home.php">Home</a></center>
    <br><br><br>
    <center>
        <h1>Change Password</h1>
    </center>

    <div>
        <form action="#" method="post" enctype="multipart/form-data" class="card">


            <center>
                <input id="pw" type="password" name="curPassword" placeholder="Enter Current Password" required>
                <br>
                <input id="newPass" type="password" name="newPassword" placeholder="Enter New Password" required>
                <br>
                <input id="confnewPass" type="password" name="confnewPassword" placeholder="Again enter New Password" required>
                <br>

                <input type="submit" name="submit" value="Submit">
            </center>

        </form>


    </div>
</body>

</html>
<?php
include_once('../../service/mysqlcon.php');
if (!empty($_POST['submit'])) {
    if (isset($_POST['curPassword']) && isset($_POST['newPassword']) && isset($_POST['confnewPassword'])) {
        $curPass = $_POST['curPassword'];
        $newPass = $_POST['newPassword'];
        $confnewPass = $_POST['confnewPassword'];
        $sql = "SELECT password FROM users WHERE userid='$loged_user_id';";
        $res = mysqli_query($link, $sql);
        $row = mysqli_fetch_array($res);
        if ($newPass == $confnewPass && $curPass == $row['password']) {
            $sql = "UPDATE users SET password='$confnewPass' where userid='$loged_user_id'";
            $success = mysqli_query($link, $sql);
            $sql1 = "UPDATE admin SET password='$confnewPass' where id='$loged_user_id'";
            $success1 = mysqli_query($link, $sql1);
            if (!$success) {
                die('Could not enter data: ');
            }
            include('../../service/mysqlcon.php');
            session_start();
            session_destroy();
            mysqli_close($link);
            header("Location: ../../");
            $msg = "Password Successfully Changed";
            echo '<script type="text/javascript">alert("' . $msg . '");</script>';
            echo "\n";
        } else {
            $msg = "Password Unmatched";
            echo '<script type="text/javascript">alert("' . $msg . '");</script>';
        }
    }
}
?>