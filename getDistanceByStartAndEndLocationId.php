<?php
    include ('connectdb.php');
    mysqli_query($conn,"SET NAMES 'utf8'");
    $location_start_id = $_GET['location_start_id']; 
    $location_end_id = $_GET['location_end_id']; 

    $query = "SELECT * FROM distance_data WHERE location_start_id = '$location_start_id' AND location_end_id = '$location_end_id' ";
    $data = mysqli_query($conn,$query);

    class Distance_Data {
        public $id;
        public $location_start_id;
        public $location_end_id;
        public $distance;

        function __construct($id, $location_start_id, $location_end_id, $distance) {
            $this->id = $id;
            $this->location_start_id = $location_start_id;
            $this->location_end_id = $location_end_id;
            $this->distance = $distance;

        }
    }

    $distanceList = array();
    while($row = mysqli_fetch_assoc($data)){
        array_push($distanceList, new Distance_Data($row['id'],$row['location_start_id'],$row['location_end_id'],$row['distance']));
        
    }
    
    echo json_encode($distanceList);
?>

