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
        <h1>Add Room</h1>
    </center>

    <form action="#" method="post" enctype="multipart/form-data">
        <div>
            Enter Room Number:
            <input type="text" placeholder="Enter Room No." name="rid" required>
            <br><br>
            Select Room Type:
            <select name="rtype" required>
                <option value="Regular Class Room">Regular Class Room</option>
                <option value="Big Class Room">Big Class Room</option>
                <option value="Conference Room">Conference Room</option>
                <option value="Meeting Room">Meeting Room</option>
                <option value="AUDI">Auditorium</option>
                <option value="Lobby">Lobby</option>
                <option value="Guest Room">Guest Room</option>
                <option value="Computer Lab">Computer Lab</option>
                <option value="EEE Lab">EEE Lab</option>
                <option value="Biology and Chemistry Lab">Biology and Chemistry Lab</option>
            </select>
            <br><br>
            Select Location:
            <select name="rlocation">
                <option value="NAC">NAC</option>
                <option value="SAC">SAC</option>
                <option value="Library Building">Library Building</option>
                <option value="Admin Building">Admin Building</option>
            </select>
            <br><br>
            <input id="submit" type="submit" name="submit" value="Submit">
        </div>

</body>

</html>
<?php
if (!empty($_POST['submit'])) {
    $roomNumber = mysqli_real_escape_string($link, $_POST['rid']);
    $roomType = mysqli_real_escape_string($link, $_POST['rtype']);
    $roomLocation = mysqli_real_escape_string($link, $_POST['rlocation']);
   
    
    $checkQuery = "SELECT * FROM room WHERE number='$roomNumber' ";
    $checkResult = mysqli_query($link, $checkQuery);
    
    if (mysqli_num_rows($checkResult) > 0) {
        echo '<script>alert("Room number already exists. Please use a different one.");</script>';
    } else {
       
        $sql = "INSERT INTO room (number, type, location) VALUES ('$roomNumber', '$roomType', '$roomLocation')";
        
        $location = LocationFactory::createLocation($roomLocation); // change to 'group' to test
        $location1= $location->getDetails();
            
            if (mysqli_query($link, $sql)) {

                


                echo '<script>alert("Data Entered Successfully! ' .$location1.  '");</script>';
            } 
            else {
                echo '<script>alert("Error inserting into room table: ' . mysqli_error($link) . '");</script>';
            }

        
        
    }
}
?>