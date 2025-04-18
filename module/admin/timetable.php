<?php
include_once('main.php');
include_once('../../service/mysqlcon.php');

// Get today's date in Y-m-d format
$today = date('Y-m-d');

// Query to fetch today's bookings
$sql = "SELECT roomNumber, facultyID, facultyName, date, time FROM bookings WHERE date = '$today'";
$result = mysqli_query($link, $sql);

$string = '';
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $string .= "<tr>
                        <td>{$row['roomNumber']}</td>
                        <td>{$row['facultyID']}</td>
                        <td>{$row['facultyName']}</td>
                        <td>{$row['date']}</td>
                        <td>{$row['time']}</td>
                    </tr>";
    }
} else {
    $string = "<tr><td colspan='5'>No bookings for today.</td></tr>";
}
?>
<html>

<head>
    <link rel="stylesheet" href="des.css">
    <style>
        .accept-btn {
            background-color: green;
            color: white;
            padding: 5px 10px;
            border: none;
            cursor: pointer;
        }

        a:hover {
            background-color: midnightblue;
        }

        .cancel-btn {
            background-color: red;
            color: white;
            padding: 5px 10px;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: maroon;
        }
    </style>
</head>

<body>
    <br />
    <center>
        <h2>Today's Bookings (<?php echo $today; ?>)</h2>
    </center>
    <center>
        <table border="1" id='admin'>
            <tr>
                <th>Room Number</th>
                <th>Booked By (Faculty ID)</th>
                <th>Faculty Name</th>
                <th>Date</th>
                <th>Time</th>
            </tr>
            <?php echo $string; ?>
        </table>
    </center>
</body>

</html>
