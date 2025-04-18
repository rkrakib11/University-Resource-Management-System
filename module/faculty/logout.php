<?php
include_once('../../service/AppSettings.php');

// Get DB connection
$appSettings = AppSettings::getInstance();
$link = $appSettings->link;
$_SESSION['login_id']='';
mysqli_close($link);
header("Location: ../../");
?>
