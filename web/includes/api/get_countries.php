<?php

include "../db.php";

// $country_id = $_GET['country_id'];

$query = "SELECT * FROM countries";


// get countries by id
// $query = "SELECT * FROM countries WHERE country_id='$country_id'";

$select_query = mysqli_query($conn, $query);

$data = array();

while ($row = mysqli_fetch_assoc($select_query)) {


    $country_id = $row['country_id'];
    $country_name = $row['country_name'];


    $data[] = $row;
}


$response = array("status" => "success", "data" => $data);
    echo json_encode($response);
    exit;
?>