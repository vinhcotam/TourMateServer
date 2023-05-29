<?php
    include ('connectdb.php');
    mysqli_query($conn,"SET NAMES 'utf8'");
    $uid = $_GET['uid']; 
    $query = "SELECT * FROM history WHERE uid = '$uid'";
    $data = mysqli_query($conn,$query);
    class History {
        public $id;
        public $uid;
        public $itinerary;
        public $date;
    

        function __construct($id, $uid, $itinerary, $date) {
            $this->id = $id;
            $this->uid = $uid;
            $this->itinerary = $itinerary;
            $this->date = $date;
        }
    }

    $historyListByUid = array();
    while($row = mysqli_fetch_assoc($data)){
        array_push($historyListByUid, new History($row['id'],$row['uid'],$row['itinerary'],$row['date']));
        
    }
    
    echo json_encode($historyListByUid);
?>