<?php
    include ('connectdb.php');
    mysqli_query($conn,"SET NAMES 'utf8'");
    $uid = $_GET['uid']; // Lấy city_id từ URL

    $query = "SELECT * FROM history WHERE uid = $uid";
    $data = mysqli_query($conn,$query);

    class History {
        public $id;
        public $uid;
        public $location_id;
        public $travel_date;
    
        function __construct($id, $uid, $location_id, $travel_date) {
            $this->id = $id;
            $this->uid = $uid;
            $this->location_id = $location_id;
            $this->travel_date = $travel_date;


        }
    }

    $historyByUid = array();
    while($row = mysqli_fetch_assoc($data)){
        array_push($historyByUid, new History($row['id'],$row['uid'],$row['location_id'], $row['travel_date']));
        
    }
    
    echo json_encode($historyByUid);
?>

