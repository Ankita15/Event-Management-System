<?php
    session_start();
    if(isset($_POST['login']))
        {

    $myusername = $_POST['userid'];
   $mypassword = md5($_POST['password']);

   $_SESSION["userid"]=$myusername;

   $con=mysqli_connect("localhost","root","","events");
   $sql = "SELECT user_type FROM user WHERE user_id = '$myusername' and user_password = '$mypassword'";
   $result = mysqli_query($con,$sql);
   $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
   
   $count = mysqli_num_rows($result);

   foreach($row as $value) {
        echo $value;

   }
   
   // If result matched $myusername and $mypassword, table row must be 1 row
    
   if($count == 1) { 
      
        if($value=="Admin"){
      
            header("location: profile/admin_profile.php");
        }
        elseif ($value=="Contributor") {
            header("location: profile/contributor_profile.php");
      
        }
        else{
            $error = "Your Login Name or Password is invalid";
            echo $error;
         }
     
   }
        mysqli_close($con);
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
   <link href="css/login.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
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
                        <li>
                            <a href="index.php" >Events</a>
                        </li>
                        <li><a href="aboutus.php">About Us</a></li>
                        <li><a href="contact-us.php">Contact</a></li>     
                        <li><a href="signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                        <li class="active"><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>                    
                    </ul>
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->
		
    </header><!--/header-->

    
    <section class="container">
        <div class="center">
            <h2>Login Form</h2>
        </div>
        <ol class="breadcrumb">
                    <li><a href="index.php">Home</a>
                    </li>
                    <li class="active"><a href="login.php">Login Page</a>
                    </li>           
        </ol>
        <div class="center">
            <form action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); 
            ?>" method="post">
              <div class="imgcontainer">
                <img src="images/avatar.png" alt="Avatar" class="avatar">
              </div>
              
                <label><b>UNCC ID</b></label><br>
                <input type="text" placeholder="Enter UNCC Email" name="userid" required>
                <br>

                <label><b>Password</b></label><br>
                <input type="password" placeholder="Enter Password" name="password" required>
                <br>
                    
                <button type="submit" name="login">Login</button><br>
                <!--<input type="checkbox" checked="checked"> Remember me-->
                <hr>
              
                <button type="reset" class="cancelbtn">Cancel</button>
                <!--<p>Forgot <a href="#">password?</a></p>-->
    
            </form>
        </div>




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