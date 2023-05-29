<?php
    include("connectdb.php");
    $uid = $_GET['uid'];
    $id = $_GET['id'];
    $query = "DELETE FROM history WHERE uid = '$uid' and id = '$id'";
    if(mysqli_query($conn, $query)){
        echo "success";
    }else{
        echo "error";
    }

?>