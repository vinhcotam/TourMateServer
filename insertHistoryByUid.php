<?php
    include("connectdb.php");
    // $id = $_POST['id'];
    // $uid = $_POST['uid'];
    // $location_id = $_POST['location_id'];
    $id = $_GET['id'];
    $uid = $_GET['uid'];
    $itinerary = $_GET['itinerary'];
    $date = $_GET['date'];

    $query = "INSERT INTO history VALUES ($id,'$uid','$itinerary', '$date')";
    if(mysqli_query($conn, $query)){
        echo "success";
    }else{
        echo "error";
    }

?>