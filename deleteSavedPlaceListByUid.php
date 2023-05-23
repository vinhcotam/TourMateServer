<?php
    include("connectdb.php");
    $uid = $_GET['uid'];
    $location_id = $_GET['location_id'];
    $query = "DELETE FROM saved_place WHERE uid = '$uid' and location_id = '$location_id'";
    if(mysqli_query($conn, $query)){
        echo "success";
    }else{
        echo "error";
    }

?>