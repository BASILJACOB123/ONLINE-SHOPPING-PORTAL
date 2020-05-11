
<style>
	td
{
	padding :10px
}




    li a {
      color: white !important;
    }

    .navbar-inverse {
      background: #2c3e50 !important;
    }


    body {

      padding-top: 70px;
    }
    #div_placement{
        position:fixed;
        right:50px;
        top:100px;
        border:2px solid black;
        width:375px;
        
    }
    img {
      height: 300px;
      width: 345px;
    }
    #Payment_{
        font-weight:400;
        margin-left:330px;
        font-size:30px;
        text-shadow: 5px 5px 10px black !important;
    }
body{
	background:url('back5.jpg');
	background-repeat:no-repeat;
	background-size: cover;
	background-position: center;
}
td
{
	padding :10px
}
</style>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<?php

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
error_reporting(0);
$query="SELECT * FROM Review";
$data=mysqli_query($conn,$query);
$total=mysqli_num_rows($data);


if($total !=0)
{
	?>
		<div id="top"></div>
    <nav class="navbar navbar-inverse  navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="DBMS_project.php" class="navbar-brand"><span class="glyphicon glyphicon-picture" aria-hidden="true"></span>&nbsp;E-Tshirts.com</a>
                <div class="nav navbar-nav">
        <li>
          <a id="Payment_">Review Data</a>
        </li>
      </div>
            </div>
        </div>
    </nav>
	<div class="container">
	<table class="table ">
	    <tr style="background:white">
		    <th >R_Id</th>
			<th>Overall_Rating</th>
			<th>D_Id</th>
			<th>Packaging_Rating</th>
			<th>Quality_Rating</th>
			<th>Email_Id</th>
			
			<th colspan="2">Operations</th>
		</tr>
	
	<?php
	echo "<br/>";
	while($result=mysqli_fetch_assoc($data))
	{
		echo"<tr class='table-primary'>
		    <td class='bg-primary'>".$result['R_Id']."</td>
			<td class='bg-success'>".$result['Overall_Rating']."</td>
			<td class='bg-warning'>".$result['D_Id']."</td>
			<td class='bg-danger'>".$result['Packing_Rating']."</td>
			<td class='bg-danger'>".$result['Quality_Rating']."</td>
			<td class='bg-danger'>".$result['Email_Id']."</td>
			<td class='bg-info'><a href='Review_Table_Update.php?R_Id=$result[R_Id]&Overall_Rating=$result[Overall_Rating]&D_Id=$result[D_Id]&Packaging_Rating=$result[Packing_Rating]&Quality_Rating=$result[Quality_Rating]&Email_Id=$result[Email_Id]'>Edit</a></td>
			<td class='bg-info'><a href='Review_Table_Delete.php?R_d=$result[R_Id]' onclick='return checkdelete()'>Delete</a></td>
		</tr>";
	}
}

else
{
	echo "No Record found";
}


?>

</table>
</div>
<script>
function checkdelete()
{
	return confirm('Are you sure you want to delete this data???');
}
</script>