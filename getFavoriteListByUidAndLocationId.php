<?php
    include ('connectdb.php');
    mysqli_query($conn,"SET NAMES 'utf8'");
    $uid = $_GET['uid']; 
    $location_id = $_GET['location_id'];
    $query = "SELECT * FROM favorite_list WHERE uid = '$uid' and location_id =$location_id";
    $data = mysqli_query($conn,$query);

    class Favorite_list {
        public $id;
        public $uid;
        public $location_id;
    
        function __construct($id, $uid, $location_id) {
            $this->id = $id;
            $this->uid = $uid;
            $this->location_id = $location_id;

        }
    }

    $favoriteListByUid = array();
    while($row = mysqli_fetch_assoc($data)){
        array_push($favoriteListByUid, new Favorite_list($row['id'],$row['uid'],$row['location_id']));
        
    }
    
    echo json_encode($favoriteListByUid);
?>

