<?php
include_once('main.php');
include_once('../../service/mysqlcon.php');
$sql = "SELECT * FROM announcement;";
$res= mysqli_query($link,$sql);
$string = "";
while($row = mysqli_fetch_array($res)){
        $string .= '<tr><td>'.$row['subject'].
    '</td><td>'.$row['date'].'</td><td>'.
    $row['details'];
}
?>

<html>
    <head>
   <link rel="stylesheet" href="des.css">
		    
		</head>
    <body>
        <br/>
        <center>
        <h2>Announcements</h2>
            <table border="1" id='faculty'>
                <tr>
                  
                    <th>Subject</th>
                    <th>Date</th>
                  	<th>Details</th>
                    
                </tr>
                <?php echo $string;?>
            </table>
        </center>
		</body>
</html>
