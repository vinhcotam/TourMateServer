<?php
    include("connectdb.php");
    $uid = $_GET['uid'];
    $query = "DELETE FROM saved_place WHERE uid = '$uid' ";
    if(mysqli_query($conn, $query)){
        echo "success";
    }else{
        echo "error";
    }

?>