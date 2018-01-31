<?php
session_start();
if($_SESSION['username'] == "")
{
    header('location:index.php');
}
include('config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<title>Green Schools Programme</title>

<!-- Bootstrap -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/custom.css" rel="stylesheet">
<link href="css/responsive.css" rel="stylesheet">
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<header class="form-hdr ">
  <div class="container">
    <figure class="logo2"><a href="#"><img src="images/logo.png" alt="" class="img-responsive"></a></figure>
    <img src="images/top-bnr.png" alt=""  class="top-bnr1 "> </div>
  <!--close container-->
  
  <div class="container-fluid nav_main">
    <div class="container">
      <nav class="navbar navbar-default">
        <div class="container-fluid"> 
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
          </div>
          
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active"><a href="response_detail1.php?id=<?php echo $_REQUEST['id']; ?>">SCHOOL PROFILE </a></li>
              <li><a href="response_detail2.php?id=<?php echo $_REQUEST['id']; ?>">GENERAL QUESTIONS </a></li>
              <li><a href="response_detail3.php?id=<?php echo $_REQUEST['id']; ?>">Air</a></li>
              <li><a href="response_detail4.php?id=<?php echo $_REQUEST['id']; ?>">Energy</a></li>
              <li><a href="response_detail5.php?id=<?php echo $_REQUEST['id']; ?>">GOOD FOOD</a></li>
              <li><a href="response_detail6.php?id=<?php echo $_REQUEST['id']; ?>">Land</a></li>
              <li><a href="response_detail7.php?id=<?php echo $_REQUEST['id']; ?>">Water</a></li>
              <li><a href="response_detail8.php?id=<?php echo $_REQUEST['id']; ?>">WASTE</a></li>
            </ul>
          </div>
          <!-- /.navbar-collapse --> 
        </div>
        <!-- /.container-fluid --> 
      </nav>
    </div>
  </div>
</header>
<!--close header-->

<div class="container">
    <div class="content-form" style="padding-top: 2px;">
    
    <!--close log-nav-->
   <h1>School Profile <div style="float: right">Percentage Completion: <?php echo $sql_percentage['completeness']; ?>%</div></h1>
    <!--close progress-->
    
   <form>
      <div class="form-group">
        <label for="exampleInputEmail1"> <span class="cube">1</span> Name of the School / Institution</label>
        <p class="formanswertext"><?php echo $sql_data['266617X34X1590']; ?></p>
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1"> <span class="cube">2</span> Address</label>
        <p class="formanswertext"><?php echo $sql_data['266617X34X1591']; ?>, <?php echo $sql_data['266617X34X1656']; ?>, <?php echo $sql_data['266617X34X1592']; ?>, <?php echo $sql_data['266617X34X1611']; ?>, <?php echo $sql_country['name']; ?></p>
      </div>
      
      
      <div class="form-group">
        <label for="exampleInputEmail1"> <span class="cube">3</span> Telephone Number <small>(Landline Number with STD code)</small></label>
        <p class="formanswertext">(ISD) <?php echo number_format($sql_data['266617X34X1597SQ001']); ?> &nbsp;&nbsp; (STD) <?php echo number_format($sql_data['266617X34X1597SQ003']); ?> &nbsp;&nbsp; (Number) <?php echo number_format($sql_data['266617X34X1597SQ002'],$decimals = 0, $dec_point = ".", $thousands_sep = ""); ?></p>
        </div>
      <div class="form-group">
        <label for="exampleInputEmail1"> <span class="cube">4</span> Mobile Number <small>(Landline Number with STD code)</small></label>
        
        <p class="formanswertext">(ISD) <?php echo number_format($sql_data['266617X34X1600SQ001']); ?> &nbsp;&nbsp; (Number) <?php echo number_format($sql_data['266617X34X1600SQ002'],$decimals = 0, $dec_point = ".", $thousands_sep = ""); ?></p>
        
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1"> <span class="cube">5</span> Principal's Name</label>
        <p class="formanswertext"><?php echo $sql_data['266617X34X1602']; ?></p>
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1"> <span class="cube">6</span> GSP Coordinator's Name </label>
       <p class="formanswertext"><?php echo $sql_data['266617X34X1604']; ?></p>
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1"> <span class="cube">7</span> GSP Coordinator's Email</label>
        <p class="formanswertext"><?php echo $sql_data['266617X34X1605']; ?></p>
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1"> <span class="cube">8</span> GSP Coordinator's Mobile Number</label>
        
          <p class="formanswertext">(ISD) <?php echo number_format($sql_data['266617X34X1606SQ001']); ?> &nbsp;&nbsp; (Number) <?php echo number_format($sql_data['266617X34X1606SQ002'],$decimals = 0, $dec_point = ".", $thousands_sep = ""); ?></p>
        
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1"> <span class="cube">9</span> Category Of The School </label>
        
        <p class="formanswertext">
            <?php 
            if($sql_data['266617X34X1608SQ001'] == "Y")
                {
                   echo "Day Scholar (6 hours)";
                } 
            elseif($sql_data['266617X34X1608SQ002'] == "Y")
            {
                echo "Day Boarding (8 hours)";
            }
            elseif($sql_data['266617X34X1608SQ003'] == "Y")
            {
                echo "Residential (24 hours)";
            }
            
            ?>
        </p>  
        
      </div>
      
      
      <div class="form-group">
        <label for="exampleInputEmail1"> <span class="cube">10</span> Category For Your School <small>(Not Applicable in Case of Residential Category)</small></label>
        
         <p class="formanswertext">
            <?php 
            if($sql_data['266617X34X1609'] == "A1")
                {
                   echo "Morning";
                } 
            elseif($sql_data['266617X34X1609'] == "A2")
            {
                echo "Evening";
            }
            elseif($sql_data['266617X34X1609'] == "A3")
            {
                echo "Both";
            }
            
            ?>
        </p>  
       
      </div>
      
      <center>
          <a class="btn org-btn" href="response_detail2.php?id=<?php echo $_REQUEST['id'] ?>">NEXT</a>
      </center>
      
    </form>
    
    
    
  </div>
  <!--close content-form--> 
</div>
<!--close container-->

<footer>
  
  <!--close container--> 
</footer>
<!--close footer--> 

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> 
<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="js/bootstrap.min.js"></script>
</body>
</html>