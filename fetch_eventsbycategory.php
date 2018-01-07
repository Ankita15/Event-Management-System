<?php
    $q = $_GET['q'];
    $con=mysqli_connect("localhost","root","","events");
    $sql="SELECT event_id, event_name,event_images,event_date,event_venue,event_time FROM event WHERE event_category = '".$q."'";
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