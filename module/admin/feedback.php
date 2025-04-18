<?php
include_once('main.php');
include_once('../../service/mysqlcon.php');
$sql = "SELECT * FROM feedback;";
$res = mysqli_query($link, $sql);
$string = "";
while ($row = mysqli_fetch_array($res)) {
    $string .= '<tr><td>' . $row['facultyID']  . '</td><td>' . $row['facultyName'] . '</td><td>' . $row['subject'] .
         '</td><td>' .
        $row['comment'];
}
?>
<html>

<head>
    <link rel="stylesheet" href="des.css">
</head>

<body>
    <br />
    <center>
        <table border="1" id='admin'>
            <tr>
                <th>Faculty ID</th>
                <th>Faculty Name</th>
                <th>Subject</th>
                <th>Comment</th>

            </tr>
            <?php echo $string; ?>
        </table>
    </center>
</body>

</html>