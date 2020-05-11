
<?php
$start_time=microtime(true);
$a=1;
for($i=1;$i<=1000;$i++){
	$a++;
}
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

$Email_Id=$_GET['email_id'];
$query="DELETE FROM CUSTOMER_TABLE WHERE Email_Id='$Email_Id'";
$data=mysqli_query($conn,$query);
if($data)
{
	echo "<script>alert('Record Deleted')</script>";
	?>
	<META HTTP-EQUIV="Refresh" CONTENT="0; URL=http://localhost:8080/basil_jacob/Customer_Table_Display.php">
	<?php
	
}

else
{
	echo "<font color='red'>Sorry, Delete process failed"; 
}


$end_time=microtime(time);
$execution_time=($end_time-$start_time);
echo " execution time =".execution_time."sec";
?>