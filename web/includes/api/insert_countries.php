<?php include '../db.php';

    $url = 'https://apifootball.com/api/?action=get_countries&APIkey=3927151cec0255e13d4d440dc5fe9ea5ca1584df169e5c6c7857a862dd01eaed';
    //read the json file contents
    $jsondata = file_get_contents($url);

    //convert json object to php associative array
    $data = json_decode($jsondata, true);



     //get the livescore details
    foreach($data as $rows){

  
    $country_id = mysqli_real_escape_string($conn, trim($rows['country_id']));
    $country_name = mysqli_real_escape_string($conn, trim($rows['country_name']));
    



$sql = "INSERT INTO countries(country_id, country_name)
      VALUES('$country_id', '$country_name')";

    
 mysqli_query($conn, $sql);
  
 }
?>