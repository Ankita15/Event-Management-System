<?php
    session_start();
    $id = intval($_GET['id']);
    $_SESSION['eid']= $id;
    include 'comment.php';

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
                        <li >
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

    <section id="blog" class="container">
       
            <?php
                $con=mysqli_connect("localhost","root","","events");
                $sql="SELECT event_name,event_desc,event_images,event_date,event_venue,event_time FROM event WHERE event_id=$id";
                $sql2="SELECT user_name, commentText from comment c INNER JOIN user u on c.user_id=u.user_id where event_id=$id";
                $result = mysqli_query($con,$sql);
                while($row = mysqli_fetch_array($result)){

                     echo "<div class='center'>
                        <h2>".$row['event_name']."</h2>

                        </div>
                    <ol class='breadcrumb'>
                                <li><a href='index.php'>Home</a>
                                </li>
                                <li class='active'>Event</li>
                                
                    </ol>

                    
                    <div class='row'>

                        <div class='col-md-8'>
                            <div id='carousel-example-generic' class='carousel slide' data-ride='carousel'>
                                
                                <div class='carousel-inner'>
                                    <div class='item active'>
                                        <img class='img-responsive' src='images/blog/".$row['event_images']."' alt=''>
                                    </div>
                                </div>
                            </div>
                        </div>";
                    echo "<div class='col-md-4'>
                    <h3><b>".$row['event_name']."</b></h3>
                    <p>".$row['event_desc']."</p>
                    <p><i class='fa fa-building-o'></i> <b>Where</b>".$row['event_venue']."</p>
                    <p><i class='fa fa-clock-o '></i> <b>Date</b>".$row['event_date']."</p>
                    <p><i class='fa fa-clock-o '></i> <b>Time</b>".$row['event_time']."</p>
                    <a class='btn btn-primary' href='carpool-forum.php'>Need Carpool</a>
                </div>";
                }
                echo "</div>
                <hr>";
                $result2 = mysqli_query($con,$sql2);
                while($r=mysqli_fetch_array($result2)) {
                    echo "<h1 id='comments_title'>Comments</h1>";
                    echo "<div class='media comment_section'>
                    <div class='pull-left post_comments'>
                    <img src='images/blog/icon.png' class='img-circle' alt='' />
                    </div>
                    <div class='media-body post_reply_comments'>
                        <h3>".$r[0]."</h3>
                        <p>".$r[1]."</p>
                    </div>
                    </div>"; 
                }

            ?>

        
        <!-- /.row -->

               
            <hr>
                <!-- Comments Form -->
                <?php
                    if(isset($_SESSION['userid'])) {
                        echo "<div class='well'>
                            <h4>Leave a Comment:</h4>
                            <form role='form' method='POST' action =''>
                                <div class='form-group'>
                                    <textarea name='ctext' class='form-control' rows='3'></textarea>
                                </div>
                                <button type='submit' name='csubmit' class='btn btn-primary'>Submit</button>
                            </form>
                        </div>";
                    }
                ?>

            </div>

            

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