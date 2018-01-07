<?php
    session_start();
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
		function showUser(str) {
		    if (str == "") {
		        document.getElementById("txtHint").innerHTML = "";
		        return;
		    } else { 
		        if (window.XMLHttpRequest) {
		            // code for IE7+, Firefox, Chrome, Opera, Safari
		            xmlhttp = new XMLHttpRequest();
		        } else {
		            // code for IE6, IE5
		            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		        }
		        xmlhttp.onreadystatechange = function() {
		            if (this.readyState == 4 && this.status == 200) {
		                document.getElementById("txtHint").innerHTML = this.responseText;
		            }
		        };
		        xmlhttp.open("GET","fetch_eventsbycategory.php?q="+str,true);
		        xmlhttp.send();
		    }
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
                        <li class="active"><a href="index.php">Home</a></li>
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

    <section id="main-slider" class="no-margin">
        <div class="carousel slide">
            <ol class="carousel-indicators">
                <li data-target="#main-slider" data-slide-to="0" class="active"></li>
                <li data-target="#main-slider" data-slide-to="1"></li>
                <li data-target="#main-slider" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">

                <div class="item active" style="background-image: url(images/slider/audience.jpg)">
                </div><!--/.item-->

                <div class="item" style="background-image: url(images/slider/cso.jpg)">
                    
                </div><!--/.item-->

                <div class="item" style="background-image: url(images/slider/49er.jpg)">
                    
                </div><!--/.item-->
            </div><!--/.carousel-inner-->
        </div><!--/.carousel-->
        <a class="prev hidden-xs" href="#main-slider" data-slide="prev">
            <i class="fa fa-chevron-left"></i>
        </a>
        <a class="next hidden-xs" href="#main-slider" data-slide="next">
            <i class="fa fa-chevron-right"></i>
        </a>
    </section><!--/#main-slider-->

    <section id="blog" class="container">
        <div class="center">
            <h2>Events</h2>

        </div>
        <ol class="breadcrumb">
                    <li class="active"><a href="index.php">Home</a>
                    </li>
                    
        </ol>

        <div class="blog">
            <div class="row">
                <div class="col-md-8" id="txtHint">      
                    <?php
					    $con=mysqli_connect("localhost","root","","events");
					    $sql="SELECT event_id, event_name,event_images,event_date,event_venue,event_time FROM event LIMIT 2 ";
					    $result = mysqli_query($con,$sql);
					    while($row = mysqli_fetch_array($result)){

					        echo "<div class='blog-item'>
					            <div class='row'>
					                <div class='col-xs-12 col-sm-2 text-center'>
					                    <div class='entry-meta'>
					                        <span id='publish_date'>".$row['event_date']."</span>";
					                 
					                        echo "<span><i class='fa fa-clock-o'></i><b>".$row['event_time']."</b></span>";
					                        echo "<span><i class='fa fa-building-o'></i><b>".$row['event_venue']."</b></span>";
					                    echo "</div>
					                </div>";
					                    
					                    echo "<div class='col-xs-12 col-sm-10 blog-content'>";
					                    echo "<img class='img-responsive img-blog' src='images/blog/".$row['event_images']."' width='100%'' alt='test' />";
					                    echo "<h2>".$row['event_name']."</h2>";
					                   
					                    echo "<a class='btn btn-primary readmore' href='event-details.php?id=".$row['event_id']."'>Read More <i class='fa fa-angle-right'></i></a>
					                </div>
					            </div>    
					        </div>";
					    }

					?>
                   
                </div><!--/.col-md-8-->

                <aside class="col-md-4">
                    <div class="widget search">
                        <form role="form">
                                <select class="form-control" name="categories" onchange="showUser(this.value)">
                                	<option value="">Search event by category</option>
								    <option value="musical">Musical</option>
								    <option value="Sports">Sports</option>
                                    <option value="food">Food</option>
								    <option value="career">Career</option>
								 </select>
              
                        </form>
                    </div><!--/.search-->
                    
                </aside>  
            </div><!--/.row-->
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