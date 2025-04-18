<?php
include_once('main.php');
require_once 'factory.php';
?>
<!DOCTYPE html>
<html>

<head>
    <title>Add Room</title>
    <link rel="stylesheet" href="des.css">
    <style>
        div {
            width: 70%;
            border-radius: 5px;
            background-color:#1231aa;
            color: aliceblue;
            padding: 20px;
            margin: auto;
        }

        input[type=submit] {
            width: 20%;
            background-color:bisque;
            color:black;
            padding: 14px 20px;
            margin: auto;
            border: none;
            border-radius: 4px;
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
        <h1>Change Notification Settings:</h1>
    </center>

    <form action="#" method="post" enctype="multipart/form-data">
        <div>
            
            Select Notification Type:
            <select name="ntype" required>
                <option value="Email Notification">Email Notification</option>
                <option value="Phone Number Notification">Phone Number Notification</option>               
            </select>
            <br><br>
            Select Email Type(This Setting Only Applicable when Notification Type is Email):
            <select name="etype">
                <option value="Gmail">Gmail</option>
                <option value="SendGrid">SendGrid</option>
            </select>
            <br><br>
            <input id="submit" type="submit" name="submit" value="Submit">
        </div>

</body>

</html>
<?php
if (!empty($_POST['submit'])) {
    $notificationType = mysqli_real_escape_string($link, $_POST['ntype']);
    $emailtype = mysqli_real_escape_string($link, $_POST['etype']);

    $sqln="UPDATE admin SET notificationtype = '$notificationType', emailtype = '$emailtype' WHERE id = '$loged_user_id'" ;
    if (mysqli_query($link, $sqln)) {

        echo '<script>alert("Notification settings changed Successfully!");</script>';

    } 
    else {
        echo '<script>alert("Error While Implementing Settings!");</script>';
    }
   
    
    
}
?>