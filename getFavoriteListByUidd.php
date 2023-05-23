<?php
    include ('connectdb.php');
    mysqli_query($conn,"SET NAMES 'utf8'");
    $uid = $_GET['uid']; 
    $query = "SELECT * FROM view_favorite_location WHERE uid = '$uid'";
    $data = mysqli_query($conn,$query);
    class View_favorite_list {
        public $favorite_id;
        public $uid;
        public $location_id;
        public $name;
        public $location;
        public $city_id;
        public $vote_average;
        public $vote_count;
        public $image_url;
        public $english_name;

        function __construct($favorite_id, $uid, $location_id, $name, $location, $city_id, $vote_average,$vote_count,$image_url,$english_name) {
            $this->favorite_id = $favorite_id;
            $this->uid = $uid;
            $this->location_id = $location_id;
            $this->name = $name;
            $this->location = $location;
            $this->city_id = $city_id;
            $this->vote_average = $vote_average;
            $this->vote_count = $vote_count;
            $this->image_url = $image_url;
            $this->english_name = $english_name;

        }
    }

    $favoriteListByUid = array();
    while($row = mysqli_fetch_assoc($data)){
        array_push($favoriteListByUid, new View_favorite_list($row['favorite_id'],$row['uid'],$row['location_id']
        ,$row['name'],$row['location'],$row['city_id'],$row['vote_average']
        ,$row['vote_count'],$row['image_url'],$row['english_name']));
        
    }
    
    echo json_encode($favoriteListByUid);
?>