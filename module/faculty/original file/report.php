<?php
include_once('main.php');
include_once('../../service/mysqlcon.php');

// Get the currently logged-in faculty's ID from session
$facultyID = $_SESSION['login_id']; // This assumes you saved faculty ID during login

// Fetch only that faculty's reports
$sql = "SELECT * FROM report WHERE id = '$facultyID'";
$res = mysqli_query($link, $sql);

$string = "";
while ($row = mysqli_fetch_array($res)) {
    $string .= '<tr>
                    <td>' . $row['date'] . '</td>
                    <td>' . $row['num'] . '</td>
                    <td>' . $row['report'] . '</td>
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
        <h2>Your Reports</h2>
        <table border="1" id='faculty'>
            <tr>
                <th>Date</th>
                <th>Room Number</th>
                <th>Message</th>
            </tr>
            <?php echo $string; ?>
        </table>
    </center>
</body>
</html>
