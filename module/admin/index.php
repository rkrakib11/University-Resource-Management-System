<button?php
  include_once('main.php');
  include_once('../../service/mysqlcon.php');
  $today=date("Y-m-d");
  $sql1="DELETE FROM leavetable where date<'$today';" ;
  $success1 = mysqli_query($link,$sql1);
  if(!$success1) {
  die('Could not delete leave details ');
    }
?>
<!DOCTYPE html>
<html>
<head><title>Admin</title>
<style>
#studentList {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

#studentList td, #studentList th {
    border: 1px solid #ddd;
    padding: 8px;
}

#studentList tr:nth-child(even){background-color: #f2f2f2;}

#studentList tr:hover {background-color: #ddd;}

#studentList th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #4CAF50;
    color: white;
}
body{
        background-image: url("dash.png");
    }
a:link, a:visited {
background-color:darkblue;
color: white;
padding: 20px 30px;
text-align: center;
text-decoration: none;
display: inline-block;
}

a:hover, a:active {
  background-color: blueviolet;

}
img{
	border-radius:50%;
}
.grid-container {
  display: grid;
  grid-template-columns: 50% 50% ;
  grid-gap: 10px;
  padding: 10px;
}

.grid-container > div {
  text-align: center;
  font-size: 20px;
}
.divi{
background-color:#64B5F6;
padding:5px;
border-radius:5px;
text-align: center;
}

</style>
</head>
<body onload="myFunction()">
<center>
<center><h1>Resource Management</h1>
<h2>Welcome <?php echo ucfirst($loged_user_name); ?></h2>
<p id="demo"></p>

<script>
var d = new Date();
document.getElementById("demo").innerHTML = d;
</script>

<br><a href="home.php">Home</a>
<a href="logout.php">Logout</a>
<div class="grid-container">
  
  </center> 
</div>
<script>
    function myFunction(){
   // alert ("You are logged in as Admin");
  //modal.style.display = "none";
	}
 </script>
</body>