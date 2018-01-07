<?php
if(isset($_POST['csubmit'])){
    $commenttext=$_POST['ctext'];
    $userid=$_SESSION['userid'];
    $id=$_SESSION['eid'];
    $con=mysqli_connect("localhost","root","","events");
    $sql = "INSERT INTO comment(commentText,event_id,user_id) VALUES('$commenttext','$id','$userid')";
    mysqli_query($con,$sql);
    header('Location: event-details.php?id='.$id);      
    }
?>