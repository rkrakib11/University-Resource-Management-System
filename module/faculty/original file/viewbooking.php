<?php
include_once('main.php');
include_once('../../service/mysqlcon.php');

// Get the currently logged-in faculty's ID from session
$facultyID = $_SESSION['login_id']; // This assumes you saved faculty ID during login

// Fetch only that faculty's reports
$sql = "SELECT * FROM bookings WHERE facultyID = '$facultyID'";
$res = mysqli_query($link, $sql);

$string = "";
while ($row = mysqli_fetch_array($res)) {
    $string .= '<tr>
                    <td>' . $row['roomNumber'] . '</td>
                    <td>' . $row['date'] . '</td>
                    <td>' . $row['time'] . '</td>
                </tr>';
}
?>

<html>
<head>
    <link rel="stylesheet" href="des.css">
  
</head>
<body>
    <br/>
    <center>
        <h2>Your Bookings</h2>
        <table border="1" id='faculty'>
            <tr>
                <th>Room Number</th>
                <th>Date</th>
                <th>Time</th>
            </tr>
            <?php echo $string; ?>
        </table>
    </center>
</body>
</html>
