<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Project";
$conn = mysqli_connect($servername, $username, $password, $dbname);

if ($conn) {
	echo "";
} else {
	die("Connection failed because " . mysqli_connect_error());
}
error_reporting(0);

?>

<html>

<head>
	<style>
	
	body{
			background:url('back.jpeg') no-repeat center center fixed;
			background-size: cover;
			
        }

	   .divform{
        text-align:left;
        width:40%;
        margin:auto;
        margin-top:70px;
        border:1px solid black;
        padding:10px;
        padding-left:30px;
        padding-right:30px;
        background:grey;
		
		
			
    }
	#heading{
		font-weight:bold;
		color:red;
	}



	.footer {
      width: 100%;
      background-color: rgb(65, 60, 60);
      color: white;
    }
    #bu_pos{
        position:fixed;
        bottom:25px;
        right:35px;
        width:380px;
        
    }

    a {
      color: white !important;
    }

    .navbar-inverse {
      background: #2c3e50 !important;
    }

    #link-color {
      color: blue;
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


		img {}

		body {
			background: url('back7.jpg');
			background-repeat:no-repeat;
			background-size:cover;
			background-position: center;
		}

		.divform {
			text-align:left;
			width: 40%;
			color: white;
			margin: auto;
			margin-top:30px;
        border:1px solid black;
        padding:20px;
        padding-left:30px;
        padding-right:30px;
		background-image:url('back6.jpg');
		}

		#cen {
			position: relative;
			text-align: center;
			margin-left: 600px;
			margin-top: 20px;
			font-weight: bold;
		}
	</style>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>

<body>
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
          <a id="Payment_">Delivery Table Update</a>
        </li>
      </div>
            </div>
        </div>
    </nav>
	<div class="divform">
		<form action="" method="GET">
			<div class="form-group">
				<span style="color:black;background:white;padding:10px;font-weight:bold;" class="text-dark">D_Id</span><input type="text"  class="form-control" name="d_id" value="<?php echo $_GET['D_Id']; ?>" /><br></br>
				<span style="color:black;background:white;padding:10px;font-weight:bold;">Email_Id</span><input class="form-control" type="text" name="email_Id" value="<?php echo $_GET['Email_Id']; ?>" /><br></br>
				<span style="color:black;background:white;padding:10px;font-weight:bold;">D_Cost</span><input class="form-control" class="form-control" type="text" name="d_Cost" value="<?php echo $_GET['D_Cost']; ?>" /><br></br>
				<span style="color:black;background:white;padding:10px;font-weight:bold;">Payment_Id</span><input  type="text" class="form-control" name="payment_Id" value="<?php echo $_GET['Payment_id']; ?>" /><br></br>
				<input type="submit" class="form-control btn btn-success" name="submit" value="Update" />
			</div>
		</form>
	</div>
	<?php
	if ($_GET['submit']) {
		$D_Id = $_GET['d_id'];
		$Email_Id = $_GET['email_Id'];
		$D_Cost = $_GET['d_Cost'];
		$Payment_Id = $_GET['payment_Id'];

		$query = "UPDATE DELIVERY SET Email_Id='$Email_Id' ,D_Cost='$D_Cost',Payment_Id='$Payment_Id' where D_Id='$D_Id' ";
		$data = mysqli_query($conn, $query);
		if ($data) {
			echo "<font color='green'>Record Updated successfully. <a href='Delivery_Table_Display.php'>Check Updated List Here</a>";
		} else {
			echo "<font color='red'>Record not updated.<a href='Delivery_Table_Display.php'>Check Updated List Here</a>";
		}
	} else {
		echo "<p style='text-align:center;font-weight:bold;background-color:white;'><font color='black;'>Click on update button to save changes</font></p>";
	}
	?>

</body>

</html>