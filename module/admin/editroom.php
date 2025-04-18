<?php
include_once('main.php');
include_once('../../service/mysqlcon.php');

if(isset($_GET['number'])){
    $room_number = $_GET['number'];
    $sql = "SELECT * FROM room WHERE number='$room_number'";
    $res = mysqli_query($link, $sql);
    $row = mysqli_fetch_array($res);
} else {
    echo "Room number not provided.";
    exit;
}

if (!empty($_POST['submit'])) {
    $roomType = mysqli_real_escape_string($link, $_POST['rtype']);
    $roomLocation = mysqli_real_escape_string($link, $_POST['rlocation']);

    $updateSql = "UPDATE room SET type='$roomType', location='$roomLocation' WHERE number='$room_number'";

    if (mysqli_query($link, $updateSql)) {
        echo '<script>alert("Room details updated successfully!"); window.location.href="room.php";</script>';
    } else {
        echo '<script>alert("Error updating room: ' . mysqli_error($link) . '");</script>';
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Edit Room</title>
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
            width: 25%;
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
        <h1>Edit Room</h1>
    </center>

    <form method="post">
        <div>
            <p>Room Number: <strong><?php echo $room_number; ?></strong></p>
            <br><br>
            Select Room Type:
            <select name="rtype" required>
                <option value="Regular Class Room" <?php if($row['type'] == "Regular Class Room") echo "selected"; ?>>Regular Class Room</option>
                <option value="Big Class Room" <?php if($row['type'] == "Big Class Room") echo "selected"; ?>>Big Class Room</option>
                <option value="Conference Room" <?php if($row['type'] == "Conference Room") echo "selected"; ?>>Conference Room</option>
                <option value="Meeting Room" <?php if($row['type'] == "Meeting Room") echo "selected"; ?>>Meeting Room</option>
                <option value="AUDI" <?php if($row['type'] == "AUDI") echo "selected"; ?>>Auditorium</option>
                <option value="Lobby" <?php if($row['type'] == "Lobby") echo "selected"; ?>>Lobby</option>
                <option value="Guest Room" <?php if($row['type'] == "Guest Room") echo "selected"; ?>>Guest Room</option>
                <option value="Computer Lab" <?php if($row['type'] == "Computer Lab") echo "selected"; ?>>Computer Lab</option>
                <option value="EEE Lab" <?php if($row['type'] == "EEE Lab") echo "selected"; ?>>EEE Lab</option>
                <option value="Biology and Chemistry Lab" <?php if($row['type'] == "Biology and Chemistry Lab") echo "selected"; ?>>Biology and Chemistry Lab</option>
            </select>
            <br><br>
            Select Location:
            <select name="rlocation">
                <option value="NAC" <?php if($row['location'] == "NAC") echo "selected"; ?>>NAC</option>
                <option value="SAC" <?php if($row['location'] == "SAC") echo "selected"; ?>>SAC</option>
                <option value="Library Building" <?php if($row['location'] == "Library Building") echo "selected"; ?>>Library Building</option>
                <option value="Admin Building" <?php if($row['location'] == "Admin Building") echo "selected"; ?>>Admin Building</option>
            </select>
            <br><br>
            <input type="submit" name="submit" value="Update Room">
        </div>
    </form>
</body>

</html>
