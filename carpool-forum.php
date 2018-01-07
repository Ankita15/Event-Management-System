<?php
session_start();
$userid=$_SESSION['userid'];
$id=$_SESSION['eid'];
if(!isset($_SESSION['userid'])){
   header("Location:login.php");
}
if(isset($_POST['cpost'])){
    $carpooltext=$_POST['carpooltext'];
    $con=mysqli_connect("localhost","root","","events");
    $sql = "INSERT INTO carpool(carpool_request,event_id,user_id) VALUES('$carpooltext','$id','$userid')";
    mysqli_query($con,$sql);
    header('Location: carpool-forum.php');      
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | Charlotte Events</title>
	
	<!-- core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
    <script>
    function mail() {
        alert("Email sent successfully!!");
    }
</script>
</head><!--/head-->

<body class="homepage">

    <header id="header">
        <div class="top-bar">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-xs-4">
                        <div class="top-number"><p><i class="fa fa-phone-square"></i>  +0123 456 70 90</p></div>
                    </div>
                    <div class="col-sm-6 col-xs-8">
                       <div class="social">
                            <ul class="social-share">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li> 
                                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                <li><a href="#"><i class="fa fa-skype"></i></a></li>
                            </ul>
                            
                       </div>
                    </div>
                </div>
            </div><!--/.container-->
        </div><!--/.top-bar-->

        <nav class="navbar navbar-inverse" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php">CHARLOTTE EVENTS</a>
                </div>
				
                <div class="collapse navbar-collapse navbar-right">
                    <ul class="nav navbar-nav">
                       <li><a href="index.php">Home</a></li>
                        <li ">
                            <a href="index.php">Events</a>
                        </li>
                        <li><a href="aboutus.php">About Us</a></li>
                        <li><a href="contact-us.php">Contact</a></li>      
                        <?php
                            if(isset($_SESSION['userid'])){
                                if($_SESSION["userid"]=="asharm50@uncc.edu"){
                                    echo "<li><a href='profile/admin_profile.php'><span class='glyphicon glyphicon-log-in'></span> Profile</a></li>";
                                    

                                }
                                else{

                                    echo "<li><a href='profile/contributor_profile.php'><span class='glyphicon glyphicon-log-in'></span> Profile</a></li>";
                                    
                                }
                                echo "<li><a href='logout.php'><span class='glyphicon glyphicon-log-out'></span> Log Out</a></li>";
                            }
                        else{

                               echo "<li><a href='signup.php'><span class='glyphicon glyphicon-user'></span> Sign Up</a></li>";
                                echo "<li><a href='login.php'><span class='glyphicon glyphicon-log-in'></span> Login</a></li>"; 
                            }
                        ?>        
                    </ul>
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->
		
    </header><!--/header-->

    
    <section class="container">
        <div class="center">
            <h2><?php 
                $con=mysqli_connect("localhost","root","","events");
                $sql="SELECT event_name from event where event_id=".$_SESSION['eid'];                
                $result=mysqli_query($con,$sql);
                while($row = mysqli_fetch_assoc($result)) {
                    echo $row['event_name'];

                }
            ?></h2>
            <h3>Carpool Discussion Forum</h3>

        </div>
        <ol class="breadcrumb">
                    <li><a href="index.php">Home</a>
                    </li>                  
        </ol>
         <div class="row">
            <div class="col-lg-12">
                <ol class="breadcrumb">
                    <li>Click Post to request for carpool!!</li>
                    <li> <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Post</button></li>
                </ol>
                
            </div>
        </div>
        <!-- Modal -->
      <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
        
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Carpool</h4>
            </div>
            <div class="modal-body">
              <form role='form' method='POST' action =''>
                <div class='form-group'>
                    <textarea name='carpooltext' class='form-control' rows='3'></textarea>
                </div>
                <button type="submit" name="cpost" class="btn btn-danger"" >Post</button>
                </form>
            </div>
          </div>
          
        </div>
      </div>
     
        <!-- Content Row -->
        <div class="row">
            <div class="col-lg-12">
                
                <?php 
                    $con=mysqli_connect("localhost","root","","events");
                    $sql="SELECT user_name, carpool_request from carpool c INNER JOIN user u on c.user_id=u.user_id where event_id=$id";
                    $result = mysqli_query($con,$sql);
                    $count=1;
                    while($row = mysqli_fetch_array($result)){
                        
                        echo "<div class='panel panel-danger'>
                            <div class='panel-heading'>
                                
                                    Discussion".$count."
                            
                            </div>
                            <div class='panel-body'>
                                ".$row['user_name']."<br>
                                <p>".$row['carpool_request']."</p>
                                <br>
                                <button type='button' class='btn btn-success' onClick='mail()'>Send Email</button>
                            </div>
                        </div>";
                        $count+=1;
                    }
                   ?>
                    
                
                <!-- /.panel-group -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->


    </section><!--/#blog-->

    
    <footer id="footer" class="midnight-blue">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    &copy; 2017 <a target="_blank" href="#" title="Charlotte Events">Charlotte Events</a>. All Rights Reserved.
                </div>
                <div class="col-sm-6">
                    <ul class="pull-right">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Events</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer><!--/#footer-->

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/wow.min.js"></script>
</body>
</html>