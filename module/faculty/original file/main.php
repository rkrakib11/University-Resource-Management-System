<?php
include_once('../../service/mysqlcon.php');
if(!isset($_SESSION['login_id'])||$_SESSION['login_id']==''){
die('Session Not Set');
}
$check=$_SESSION['login_id'];
$session=mysqli_query($link,"SELECT name  FROM faculty WHERE id='$check' ");
if(mysqli_num_rows($session)<1)
{
	die('Invalid Session');
}
$row=mysqli_fetch_array($session);
$login_session = $loged_user_name = $row['name'];
$session1=mysqli_query($link,"SELECT *  FROM faculty WHERE id='$check' ");
$row1=mysqli_fetch_array($session1);
$loged_user_id=$row1['id'];
$facName=$row1['name'];
$facPass=$row1['password'];
$phone=$row1['phone'];
$email=$row1['email'];
$facDOB=$row1['dob'];
$facDOJ=$row1['doj'];
$email=$row1['email'];
$facGender=$row1['gender'];
if(!isset($login_session)){
    //header("Location:../../");
}
?>