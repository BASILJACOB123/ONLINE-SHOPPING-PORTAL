<?php
//session_start();
$mailto="parasjain21389@gmail.com";
$mailSub="Payment and invoice details for successful payment";
$mailMsg="Thank you for shoppig with us your payment was successfull .Here are the order details <br> Customer name : " ;
 $headers="From:parasjain21389@gmail.com";   
   

   if(mail($mailto,$mailSub,$mailMsg,$headers))
   {
       echo "Mail Sent";
   }
   else
   {
       echo "Mail not Sent";
   }


          ?>
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
    .im{
        width: 400px;
        height: 200px;
        margin-left: 550px;
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
          <a id="Payment_">Review Page</a>
        </li>
      </div>
            </div>
        </div>
    </nav>
<div class="bg-image"></div>

<img src="ps.png" alt="Payment Successful" class="im"> 
<div class="divform bg-primary"> 
<div class="form-group">
<form action="" method="GET">
<!-- R_Id<input class="form-control" type="text" name="R_id" value="" requried/><br> -->
Overall_Rating<input class="form-control" type="text" name="Overall_rate" value="" requried/><br>

Packaging_Rating<input class="form-control" type="text" name="Pack_rate" value=""  /><br>
Quality_Rating<input min="3" max="5" class="form-control" type="text" name="Quality_rate" value="" requried/><br>

<input class="form-control btn-warning" type="submit" name="submit" value ="Submit"/>


</form>
</div>
</div>
<?php

$D_Id = $_GET['Delivery_Id'];
$Email_Id = $_GET['email_id'];
$customer_id = $_GET['Customer_id'];
//echo $D_Id;
if($D_Id)
      {
$_SESSION["DL_ID"]=$D_Id;
$_SESSION["EMAIL_ID"]=$Email_Id;
$_SESSION["CUST_ID"]=$customer_id;
//echo $_SESSION["DL_ID"];
      }
if($_GET['submit'])
{
    $R_id=(int)(time()/100);
    $Over_rate=$_GET['Overall_rate'];
    
    //$D_id=$_GET['d_id'];
    //echo "Session after Submit".$_SESSION["DL_ID"]. ".<br>";
    $D_ID=$_SESSION["DL_ID"];
    $D_id=(int)$D_ID;
    //echo $D_id;
    $Pack_rate=$_GET['Pack_rate'];
    $Quality_Rate=$_GET['Quality_rate'];
    $Email_Id=$_SESSION["EMAIL_ID"];
    $customer_id=$_SESSION["CUST_ID"];
    
    $Pass=$_GET['Password'];
    
    
        $query ="INSERT INTO Review values('$R_id','$Over_rate','$D_id','$Pack_rate','$Quality_Rate','$customer_id')";
        $data=mysqli_query($conn,$query);   
        if($data)
        {
            echo "<p style='color:White;'>Thankyou for your valuable feedback . Youre registered mail id is $Email_Id.  </p>";
    }
    else{
      echo("Error description: " . mysqli_error($conn));
    }
}
?>

</body>
</html>