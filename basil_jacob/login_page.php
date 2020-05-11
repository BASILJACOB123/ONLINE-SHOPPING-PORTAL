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
?>

<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
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
	</style>
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
          <a id="Payment_">LOGIN PAGE</a>
        </li>
      </div>
            </div>
        </div>
    </nav>
<div class="bg-image"></div>
<div class="divform bg-primary"> 
<div class="form-group">
<form action="" method="GET">
Email_Id<input class="form-control" type="text" name="username" value="" requried/><br>
Password<input class="form-control" type="password" name="pass" value="" requried/><br>
<input class="form-control btn-warning" type="submit" name="submit" value ="Login"/>


</form>
</div>
</div>
<?php

if($_GET['submit'])
{
	$email_Id=$_GET['username'];
    $pass=$_GET['pass'];
	$query="SELECT * FROM customer_table WHERE Email_Id= '$email_Id' && password='$pass'";
	$result=mysqli_query($conn,$query);
	// function randomDigits($length){
	// 	$numbers = range(0,9);
	// 	shuffle($numbers);
	// 	for($i = 0;$i < $length;$i++)
	// 		$digits .= $numbers[$i];
	// 	return $digits;
	// 	}
	$num=mysqli_num_rows($result);
    if($num==1){
        ?>
        <META HTTP-EQUIV="refresh" CONTENT="0; URL='http://localhost:8080/basil_jacob/DBMS_project.php?email_id=<?php echo $email_Id ?>';">
        <?php
    }
	else
    {

        echo "<p style='color:white;margin-left:600px;font-size:30px;'>Incorrect EmailID/password </p>";
      
    }
}
?>

</body>
</html>