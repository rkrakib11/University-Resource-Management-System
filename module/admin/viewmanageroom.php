<?php
include_once('main.php');
include_once('../../service/mysqlcon.php');

$sql = "SELECT * FROM request;";
$res = mysqli_query($link, $sql);
$string = "";

while ($row = mysqli_fetch_array($res)) {
    $string .= '<tr>
                    <td>' . $row['roomNumber'] . '</td>
                    <td>' . $row['facultyID'] . '</td>
                    <td>' . $row['facultyName'] . '</td>
                    <td>' . $row['date'] . '</td>
                    <td>' . $row['time'] . '</td>
                    <td>' . $row['reason'] . '</td>
                    <td>
                        <form method="POST" action="acceptbooking.php">
                            <input type="hidden" name="roomNumber" value="' . $row['roomNumber'] . '">
                            <input type="hidden" name="facultyID" value="' . $row['facultyID'] . '">
                            <input type="hidden" name="facultyName" value="' . $row['facultyName'] . '">
                            <input type="hidden" name="date" value="' . $row['date'] . '">
                            <input type="hidden" name="time" value="' . $row['time'] . '">
                            <button type="submit" class="accept-btn">Accept</button>
                        </form>
                            <form method="POST" action="cancelbooking.php">
                            <input type="hidden" name="roomNumber" value="' . $row['roomNumber'] . '">
                            <input type="hidden" name="facultyID" value="' . $row['facultyID'] . '">
                            <input type="hidden" name="facultyName" value="' . $row['facultyName'] . '">
                            <input type="hidden" name="date" value="' . $row['date'] . '">
                            <input type="hidden" name="time" value="' . $row['time'] . '">
                            <button type="submit" class="cancel-btn">Cancel</button>
                        </form>
                    </td>
                </tr>';
}
?>
<html>

<head>
    <link rel="stylesheet" href="des.css">
    <style>
        .accept-btn {
            background-color: darkgreen;
            color: white;
            padding: 10px 10px;
            border: none;
            cursor: pointer;
        }

        .accept-btn:hover{
            background-color: midnightblue;
        }

        
        .cancel-btn {
            background-color: red;
            color: white;
            padding: 5px 10px;
            border: none;
            cursor: pointer;
        }
         .cancel-btn:hover{
            background-color: maroon;
         }
    </style>
</head>

<body>
    <br/>
    <center>
        <h2>Manage and Confirm Rooms Booking</h2>
    </center>
    <center>
        <table border="1" id='admin'>
            <tr>
                <th>Room Number</th>
                <th>Booked By (Faculty ID)</th>
                <th>Faculty Name</th>
                <th>Date</th>
                <th>Time</th>
                <th>Reason</th>
                <th>Actions</th>
            </tr>
            <?php echo $string; ?>
        </table>
    </center>
</body>

</html>
