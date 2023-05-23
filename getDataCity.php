<?php
    include ('connectdb.php');
    mysqli_query($conn,"SET NAMES 'utf8'");
    $query = "SELECT * FROM city ";
    $data = mysqli_query($conn,$query);

    class City {
        public $city_id;
        public $city_name;
        public $english_name;
    
    
        function __construct($city_id, $city_name, $english_name) {
            $this->city_id = $city_id;
            $this->city_name = $city_name;
            $this->english_name = $english_name;

        }
    }

    $cityArray = array();
    while($row = mysqli_fetch_assoc($data)){
        array_push($cityArray, new City($row['city_id'],$row['city_name'], $row['english_name']));
        
    }
    
    echo json_encode($cityArray);
?>

