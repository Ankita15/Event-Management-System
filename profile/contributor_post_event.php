<?php
session_start();
if(isset($_POST['submit']))
{
    $eventname=$_POST['eventname'];
    $eventcategory=$_POST['eventcategory'];
    $eventdesc=$_POST['eventdesc'];
    $eventdate=$_POST['eventdate'];
    $eventvenue=$_POST['eventvenue'];
    $eventtime=$_POST['eventtime'];
    $userid=$_SESSION["userid"];

    $folder="C:/xampp/htdocs/CharlotteEvents/images/blog/";
    $con=mysqli_connect("localhost","root","","events");
    $file=basename($_FILES["file"]["name"]);
    $target_file = $folder.$file;
    move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);

    $sql = "INSERT INTO event(event_name,event_desc,event_images,event_date,event_venue,event_time,user_id,event_category) VALUES('$eventname','$eventdesc','$file','$eventdate','$eventvenue','$eventtime','$userid','$eventcategory')";
    mysqli_query($con, $sql); 
    
    echo "<script type='text/javascript'>alert('Event has been added successfully!! ');</script>";
    mysqli_close($con);
}

?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Contributor Dashboard</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Welcome</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                
                <li class="dropdown">
                    <a href="..\index.php" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-home"></i>Home</a></li>
                    
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i><?php echo $_SESSION['userid']; ?><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="contributor_profile.php"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        
                        <li class="divider"></li>
                        <li>
                            <a href="..\logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="contributor_profile.php"><i class="fa fa-fw fa-dashboard"></i> Profile</a>
                    </li>
                    <li class="active">
                        <a href="contributor_post_event.php"><i class="fa fa-fw fa-plus-square-o"></i> Post Event</a>
                    </li>
                    <li>
                        <a href="contributor_delete_event.php"><i class="fa fa-fw fa-minus-square-o"></i> Delete Event</a>
                    </li>
                    <!--
                    <li>
                        <a href="carpool_contributor.html"><i class="fa fa-fw fa-cut"></i> Post Carpool</a>
                    </li>-->
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>


        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            POST EVENT
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> POST EVENT
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-6">

                        <form role="form" method="POST" action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF'] ); 
            ?>" enctype='multipart/form-data'>
                            <!--<div class="form-group">
                                    <label for="disabledSelect">Event ID</label>
                                    <input class="form-control" id="disabledInput" type="text" placeholder="1" disabled >
                                    
                            </div>-->

                            <div class="form-group">
                                <label>Event Name</label>
                                <input name="eventname" class="form-control" placeholder="For ex. Career Fair 2017">
                                
                            </div>
                            <div class="form-group">
                                <label>Event Category</label>
                                 <input name="eventcategory" class="form-control" placeholder="musical/food/sports/career">
                            </div>
                            <div class="form-group">
                                <label>Event Description</label>
                                <textarea name="eventdesc" class="form-control" placeholder="Tell us about your event" rows="4"></textarea>
                            </div>

                             <div class="form-group">
                                <label>Event Image</label>
                                <input type="file" name="file" id="fileToUpload" class="form-control">
                            </div>


                            <div class="form-group">
                                <label>Event Date</label>
                                <input name="eventdate" type="Date" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Event Venue</label>
                                <input name="eventvenue" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Event Time</label>
                                <input name="eventtime" type="Time" class="form-control">
                            </div>

                            <button type="submit" name="submit" class="btn btn-success">Post Event</button>
                            <button type="reset" class="btn btn-primary">Reset</button>

                        </form>

                    </div>
                    
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
