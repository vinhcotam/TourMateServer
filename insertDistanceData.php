<?php
    include("connectdb.php");
    $location_start_id  =$_GET['location_start_id'];
    $location_end_id  = $_GET['location_end_id'];
    $distance = $_GET['distance'];
    $query = "Insert into distance_data (location_start_id, location_end_id, distance) values('$location_start_id','$location_end_id', '$distance')";
    if(mysqli_query($conn, $query)){
        echo "success";
    }else{
        echo "error";
    }
?>