<?php include '../db.php';

    $query = "SELECT distinct league_id FROM matches";

    $data=array();

    if ($result = mysqli_query($conn, $query)) {

    // fetch associative array 
    while ($row = mysqli_fetch_assoc($result)) {
        
        
      $league_id=$row['league_id'];

    $url = "https://apifootball.com/api/?action=get_standings&league_id=".$league_id."&APIkey=3927151cec0255e13d4d440dc5fe9ea5ca1584df169e5c6c7857a862dd01eaed";



    //read the json file contents
    $jsondata = file_get_contents($url);

    

    //convert json object to php associative array
    $data = json_decode($jsondata, true);


    foreach($data as $rows){
        $country_name= mysqli_real_escape_string($conn, trim($rows['country_name']));
        $league_id = mysqli_real_escape_string($conn, trim($rows['league_id']));
        $league_name = mysqli_real_escape_string($conn, trim($rows['league_name']));
        $team_name = mysqli_real_escape_string($conn, trim($rows['team_name']));
        $overall_league_position = mysqli_real_escape_string($conn, trim($rows['overall_league_position']));
        $overall_league_payed = mysqli_real_escape_string($conn, trim($rows['overall_league_payed']));
        $overall_league_W = mysqli_real_escape_string($conn, trim($rows['overall_league_W']));
        $overall_league_D = mysqli_real_escape_string($conn, trim($rows['overall_league_D']));
        $overall_league_L = mysqli_real_escape_string($conn, trim($rows['overall_league_L']));
        $overall_league_GF = mysqli_real_escape_string($conn, trim($rows['overall_league_GF']));
        $overall_league_GA = mysqli_real_escape_string($conn, trim($rows['overall_league_GA']));
        $overall_league_PTS = mysqli_real_escape_string($conn, trim($rows['overall_league_PTS']));
        $home_league_position = mysqli_real_escape_string($conn, trim($rows['home_league_position']));
        $home_league_payed = mysqli_real_escape_string($conn, trim($rows['home_league_payed']));
        $home_league_W= mysqli_real_escape_string($conn, trim($rows['home_league_W']));
        $home_league_D = mysqli_real_escape_string($conn, trim($rows['home_league_D']));
        $home_league_L = mysqli_real_escape_string($conn, trim($rows['home_league_L']));
        $home_league_GF = mysqli_real_escape_string($conn, trim($rows['home_league_GF']));
        $home_league_GA = mysqli_real_escape_string($conn, trim($rows['home_league_GA']));
        $home_league_PTS= mysqli_real_escape_string($conn, trim($rows['home_league_PTS']));
        $away_league_position = mysqli_real_escape_string($conn, trim($rows['away_league_position']));
        $away_league_payed = mysqli_real_escape_string($conn, trim($rows['away_league_payed']));
        $away_league_W = mysqli_real_escape_string($conn, trim($rows['away_league_W']));
        $away_league_D = mysqli_real_escape_string($conn, trim($rows['away_league_D']));
        $away_league_L= mysqli_real_escape_string($conn, trim($rows['away_league_L']));
        $away_league_GF = mysqli_real_escape_string($conn, trim($rows['away_league_GF']));
        $away_league_GA = mysqli_real_escape_string($conn, trim($rows['away_league_GA']));
        $away_league_PTS = mysqli_real_escape_string($conn, trim($rows['away_league_PTS']));


$sql = "INSERT INTO standings(country_name, league_id, league_name, team_name, overall_league_position, overall_league_payed, overall_league_W, overall_league_D, overall_league_L, overall_league_GF, overall_league_GA, overall_league_PTS, home_league_position, home_league_payed, home_league_W, home_league_D, home_league_L, home_league_GF, home_league_GA, home_league_PTS, away_league_position, away_league_payed, away_league_W, away_league_D, away_league_L, away_league_GF, away_league_GA, away_league_PTS) 
VALUES ('$country_name', '$league_id', '$league_name', '$team_name', '$overall_league_position', '$overall_league_payed', '$overall_league_W', '$overall_league_D', '$overall_league_L', '$overall_league_GF', '$overall_league_GA', '$overall_league_PTS', '$home_league_position', '$home_league_payed', '$home_league_W', '$home_league_D', '$home_league_L', '$home_league_GF', '$home_league_GA', '$home_league_PTS', '$away_league_position', '$away_league_payed', '$away_league_W', '$away_league_D', '$away_league_L', '$away_league_GF', '$away_league_GA', '$away_league_PTS')";

    mysqli_query($conn, $sql);
}

}

}

 ?>