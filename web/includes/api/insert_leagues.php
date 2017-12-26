<?php include '../db.php';

    $query = "SELECT distinct country_id FROM countries";

    $data=array();

    if ($result = mysqli_query($conn, $query)) {

    // fetch associative array 
    while ($row = mysqli_fetch_assoc($result)) {
        
        
      $country_id=$row['country_id'];

    $url = "https://apifootball.com/api/?action=get_leagues&country_id=".$country_id."&APIkey=3927151cec0255e13d4d440dc5fe9ea5ca1584df169e5c6c7857a862dd01eaed";



    //read the json file contents
    $jsondata = file_get_contents($url);

    

    //convert json object to php associative array
    $data = json_decode($jsondata, true);


    foreach($data as $rows){
        $country_name= mysqli_real_escape_string($conn, trim($rows['country_name']));
        $league_id = mysqli_real_escape_string($conn, trim($rows['league_id']));
        $league_name = mysqli_real_escape_string($conn, trim($rows['league_name']));
        


$sql = "INSERT INTO leagues(country_name, league_id, league_name) 
VALUES ('$country_name', '$league_id', '$league_name')";

   mysqli_query($conn, $sql);
}

}

}

 ?>