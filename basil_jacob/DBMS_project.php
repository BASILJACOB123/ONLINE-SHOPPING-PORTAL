<?php
session_start();
$servername= "localhost";
$username = "root";
$password = "";
$dbname = "Project";

 
$conn = mysqli_connect($servername,$username,$password,$dbname);


if($conn){


}else{
die("connection failed because".mysqli_connect_error());
}
error_reporting(0);
$result_per_page=2;
$query = "SELECT * FROM PRODUCT";
$data = mysqli_query($conn,$query);
$total = mysqli_num_rows($data);
echo $result;

?>





<!DOCTYPE html>
<html lang="en">

<head>
  <style>
    .ma{
      color: blue;
    }
    .footer {
      width: 100%;
      background-color: rgb(65, 60, 60);
      color: white;
    }

.cv{
  text-align: right;
  margin-top: 13px;
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
.nv{
  margin-bottom: 10px;
  margin-top: 0px;
}
    /* div img:hover {
      transform: scale(1.5);
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
    } */
    .strike {
      text-decoration: line-through !important;
    }

li{
  color: :white;
  font-size: 20px;
}
    img {
      height: 300px;
      width: 345px;
    }

    .jumbotron {
      color: #2c3e50 !important;
    }
  </style>
  <title>Mini project</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="sytlesheet" type="text/css" href="galleryk.css">

</head>

<body>
<div id="top"></div>
  <nav class="navbar navbar-inverse  navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
          data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <?php
        $email_id= $_GET['email_id'];
        ?>
        <a href="DBMS_project.php?email_id=<?php echo $email_id ?>" class="navbar-brand"><span class="glyphicon glyphicon-picture"
            aria-hidden="true"></span>&nbsp;E-Tshirts.com</a>

      <div class="nav navbar-nav">
        <li>
          <a href="ADMIN_DBMS_project.php">Admin</a>
        </li>
        <li>
          <?php
          if($_GET['email_id'])
          {
    $Color = "white";
    $Text = $_GET['email_id'];

    echo '<div class="cv" style="Color:'.$Color.'">Welcome '.$Text.'</div>';
    ?>
</div>
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="Logout.php">Logout</a></li>
        </ul>
      </div>

    </div>
    <?php
}

else {
  ?>
  </div>
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="Customer_Table_Form.php">Sign up</a></li>
        </ul>
      </div>

    </div>
    </div>
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
          <li><a class="nv" href="login_page.php">Login page</a></li>
        </ul>
      </div>

    </div>
    <?php
}
?>
        </li>
      
  </nav>

  <div class="container">
    <div class="jumbotron">
      <h1><span class="glyphicon glyphicon-camera" aria-hidden="true"></span> The Tshirt World</h1>
      <p>A place where you fall in love with Tshirts</p>
    </div>
    <div class="row">
     
<?php
$email_id= $_GET['email_id'];
$customer_id = $_GET['customer_id'];

echo $no_of_pages=ceil($total/$result_per_page);

if(!isset($_GET['page'])){
  $page=1;

}
else
{
  $page=$_GET['page'];
}
$this_page_first_result=($page-1)*$result_per_page;
$query = 'SELECT * FROM PRODUCT LIMIT ' . $this_page_first_result . ',' .  $result_per_page;
$data = mysqli_query($conn,$query);

while($result = mysqli_fetch_assoc($data)){
    echo "
    <div class='col-lg-6  col-sm-6'>
    <div class='thumbnail'>
      <div class='card' style='width: 18rem;'> 
    <img src=".$result['P_image']." class='card-img-top' alt='...'>
    <div class='card-body'>
      <h5 class='card-title' style='font-weight:bold'>&nbsp;".$result['P_Name']."</h5><br>
      <p class='card-text'>".$result['P_Description']."</p>
    </div>
    <ul class='list-group list-group-flush'>
      <li class='list-group-item' style='text-decoration:line-through;'>Market Price : $".$result['P_Market_Price']."</li>
      <li class='list-group-item'>Our Price : $".$result['P_Our_Price']."</li>
      <li class='list-group-item'>
      <a class='btn btn-success' href='Payment.php?email_id=$email_id&customer_id=$customer_id&p_id=$result[P_id]&p_name=$result[P_Name]&p_description=$result[P_Description]&p_market_price=$result[P_Market_Price]&p_our_price=$result[P_Our_Price]&p_image=$result[P_image]'>Buy Now</a>
      </li>
    </ul>
  </div>
</div>
</div>";
}


?>
<br>
<br>
<div>
<nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
        <span class="sr-only">Previous</span>
      </a>
    </li>
    <?php
for($page=1;$page<=$no_of_pages;$page++){
  ?>
    <li class="page-item"><a class="page-link" href="DBMS_project.php?email_id=<?php echo $email_id?>&page=<?php echo $page ?>"><?php echo $page ?></a></li>
    <?php
  }
  ?>
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
        <span class="sr-only">Next</span>
      </a>
    </li>
  </ul>
</nav>
</div>
    </div>
  </div>

  <!-- Footer of the Website   = == ===  = = = == = = = = == = =  = ==  == =  = == = = = =-->

  <div class="footer" style="margin:0px;padding:0px;">
    <div style="padding-left:30px;padding-top:40px;padding-bottom:50px">
      <a href="#top" style="padding-left:700px;font-size:30px;">Back to Top</a>
        <p>Get to Know Us</p>
        <p>About Us</p>
        <p>Careers</p>
        <p>Press Release</p>
        <p>E-Tshirt Cares</p>
        <p>Gift a smile</p>
		<p>Contact us : 9856790023,9761819012<p>
        <p style="margin:0px;">alkdsfjadsl;k</p>
    </div>
    
  </div>



  <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>
</body>

</html>