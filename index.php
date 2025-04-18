<?php
$login_code = isset($_REQUEST['login']) ? $_REQUEST['login'] : '1';
if ($login_code == "false") {
    $login_message = "Wrong Username or Password!";
    $color = "red";
} else {
    $login_message = "Please Login !";
    $color = "White";
}
?>
<!DOCTYPE html>
<html>

<head>

    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <style>
        input[type=text],
        input[type=password] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        button {
            background-color: blueviolet;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 25%;
            border-radius: 10px;
        }

        button:hover {
            opacity: 0.8;
        }

        .cancelbtn {
            width: auto;
            padding: 10px 18px;
            background-color: #f44336;
        }

        .container {
            padding:30px 20px;

        }

        div {
            width: 20%;
            border-radius: 10px;
            background-color: #f2f2f2;
            padding: 20px;
        }

        body {
            background-image: url("bg.png");
            width: inherit;
            height: auto;
        }
    </style>
    <title>Resource Management</title>
</head>

<body style="font-family: 'Lato', sans-serif;">
    <br><br><br><br><br><br><br><br><br><br><br><br><br>
    <form action="service/check.access.php" onsubmit="return loginValidate();" method="post" onreset="myReset()">
        <br><br><br><br>
        <center><?php echo "<font size='4' color='$color'>$login_message</font>"; ?></center>
        <center>
            <div class="container">
                <label for="uname"><b>Userid</b></label>
                <input type="text" placeholder="Enter User ID" name="myid" required>
                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="mypassword" required>
                <button type="submit">Login</button> <button type="reset" id="rset">Reset</button>
        </center>
        </div>
    </form>
    <script>
        function myReset() {
            alert("The form was reset");
        }
    </script>
</body>

</html>