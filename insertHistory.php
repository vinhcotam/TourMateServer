<?php
    include("connectdb.php");
    $uid =$_POST['uid'];
    $location_id = $_POST['location_id'];
    $travel_date = $_POST['travel_date'];
    $query = "Insert into history (uid, location_id, travel_date) values('$uid','location_id', '$travel_date')";
    if(mysqli_query($conn, $query)){
        echo "success";
    }else{
        echo "error";
    }
?>