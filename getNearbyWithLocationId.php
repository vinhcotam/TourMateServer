<?php
    include ('connectdb.php');
    mysqli_query($conn,"SET NAMES 'utf8'");
    $location_id = $_GET['location_id']; // Lấy city_id từ URL

    $query = "SELECT * FROM nearby_location WHERE location_id = $location_id";
    $data = mysqli_query($conn,$query);

    class Nearby_Location {
        public $id;
        public $name;
        public $location;
        public $latitude;
        public $longtitude;
        public $type;
        public $location_id ;

    
    
        function __construct($id, $name, $location, $latitude, $longtitude, $type, $location_id) {
            $this->id = $id;
            $this->name = $name;
            $this->location = $location;
            $this->latitude = $latitude;
            $this->longtitude = $longtitude;
            $this->type = $type;
            $this->location_id = $location_id;

        }
    }

    $NearbyLocationByIDArray = array();
    while($row = mysqli_fetch_assoc($data)){
        array_push($NearbyLocationByIDArray, new Nearby_Location($row['id'],$row['name'],$row['location'], $row['latitude'],$row['longtitude'],$row['type'],$row['location_id']));
        
    }
    
    echo json_encode($NearbyLocationByIDArray);
?>

