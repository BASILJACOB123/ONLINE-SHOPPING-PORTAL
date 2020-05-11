v<?php

$servername="localhost";
$username="root";
$password="";
$dbname="Project";

$conn=mysqli_connect($servername,$username,$password,$dbname);

if($conn)
{
	echo "";
}
else
{
	die("Connection failed because ".mysqli_connect_error());
	
}

$R_Id=$_GET['R_d'];
$query="DELETE FROM Review WHERE R_Id='$R_Id'";
$data=mysqli_query($conn,$query);
if($data)
{
	echo "<script>alert('Record Deleted')</script>";
	?>
	<META HTTP-EQUIV="Refresh" CONTENT="0; URL='http://localhost:8080/basil_jacob/Review_Table_Display.php'">
	<?php 	
}

else
{
	echo "<font color='red'>Sorry, Delete process failed"; 
}



?>