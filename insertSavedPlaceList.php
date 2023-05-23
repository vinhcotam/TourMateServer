<?php
    include("connectdb.php");
    // $id = $_POST['id'];
    // $uid = $_POST['uid'];
    // $location_id = $_POST['location_id'];
    $id = $_GET['id'];
    $uid = $_GET['uid'];
    $location_id = $_GET['location_id'];
    
    $query = "INSERT INTO saved_place VALUES ($id,'$uid',$location_id)";
    if(mysqli_query($conn, $query)){
        echo "success";
    }else{
        echo "error";
    }

?>