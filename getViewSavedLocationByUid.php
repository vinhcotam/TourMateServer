<?php
    include ('connectdb.php');
    mysqli_query($conn,"SET NAMES 'utf8'");
    $uid = $_GET['uid']; 
    $query = "SELECT * FROM saved_places_view WHERE uid = '$uid'";
    $data = mysqli_query($conn,$query);
    class View_saved_place {
        public $saved_place_id;
        public $uid;
        public $location_id;
        public $name;
        public $location;
        public $city_id;
        public $latitude;
        public $longtitude;

        public $vote_average;
        public $vote_count;
        public $image_url;
        public $english_name;
        public $min_hour;
        public $max_hour;

        function __construct($saved_place_id, $uid, $location_id, $name, $location, $city_id, $latitude, $longtitude, $vote_average,$vote_count,$image_url,$english_name, $min_hour, $max_hour) {
            $this->saved_place_id = $saved_place_id;
            $this->uid = $uid;
            $this->location_id = $location_id;
            $this->name = $name;
            $this->location = $location;
            $this->city_id = $city_id;
            $this->latitude = $latitude;
            $this->longtitude = $longtitude;
            $this->vote_average = $vote_average;
            $this->vote_count = $vote_count;
            $this->image_url = $image_url;
            $this->english_name = $english_name;
            $this->min_hour = $min_hour;
            $this->max_hour = $max_hour;
        }
    }

    $savedPLaceListByUid = array();
    while($row = mysqli_fetch_assoc($data)){
        array_push($savedPLaceListByUid, new View_saved_place($row['saved_place_id'],$row['uid'],$row['location_id']
        ,$row['name'],$row['location'],$row['city_id'],$row['latitude'],$row['longtitude'],$row['vote_average']
        ,$row['vote_count'],$row['image_url'],$row['english_name'],$row['min_hour'],$row['max_hour']));
        
    }
    
    echo json_encode($savedPLaceListByUid);
?>