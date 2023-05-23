<?php
    include ('connectdb.php');
    mysqli_query($conn,"SET NAMES 'utf8'");
    $query = "SELECT *FROM data_location ORDER BY vote_average DESC, vote_count DESC LIMIT 10";
    $data = mysqli_query($conn,$query);

    class Data_Location {
        public $id;
        public $name;
        public $location;
        public $latitude;
        public $longtitude;
        public $city_id;
        public $vote_average;
        public $vote_count;
        public $min_hour;
        public $max_hour;
        public $image_url;
        public $description;
        public $english_name;

        function __construct($id, $name, $location, $latitude, $longtitude, $city_id, 
        $vote_average, $vote_count, $min_hour, $max_hour, $image_url, $description, $english_name) {
            $this->id = $id;
            $this->name = $name;
            $this->location = $location;
            $this->latitude = $latitude;
            $this->longtitude = $longtitude;
            $this->city_id = $city_id;
            $this->vote_average = $vote_average;
            $this->vote_count = $vote_count;
            $this->min_hour = $min_hour;
            $this->max_hour = $max_hour;
            $this->image_url = $image_url;
            $this->description = $description;
            $this->english_name = $english_name;

        }
    }

    $locationArray = array();
    while($row = mysqli_fetch_assoc($data)){
        array_push($locationArray, new Data_Location($row['id'],$row['name'],$row['location'], $row['latitude'],
        $row['longtitude'],$row['city_id'],$row['vote_average'],$row['vote_count'],$row['min_hour']
        ,$row['max_hour'],$row['image_url'],$row['description'],$row['english_name']));
        
    }
    
    echo json_encode($locationArray);
?>

