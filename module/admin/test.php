<?php

include_once('main.php');

$update_sql1 = "SELECT * FROM admin WHERE id = '$loged_user_id'";
$result4 = mysqli_query($link, $update_sql1);
$row4 = mysqli_fetch_assoc($result4);
$etype = $row4['emailtype'];
if($etype=="Gmail"){
    echo "same";
}
else{
    echo "not same";
}
    




?>
