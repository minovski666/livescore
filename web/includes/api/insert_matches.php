<?php include '../db.php';

    


   $time_api_start = microtime(true);   

    $url = "https://apifootball.com/api/?action=get_events&from=2017-01-01&to=2017-12-31&APIkey=3927151cec0255e13d4d440dc5fe9ea5ca1584df169e5c6c7857a862dd01eaed";
    //read the json file contents
    $jsondata = file_get_contents($url);
$time_api_end = microtime(true);
    //convert json object to php associative array
    $data = json_decode($jsondata, true);

    

 $execution_api_time = ($time_api_end - $time_api_start);

$time_start = microtime(true);


     //get the livescore details
    foreach($data as $rows){

    $match_id= mysqli_real_escape_string($conn, trim($rows['match_id']));
    $country_id = mysqli_real_escape_string($conn, trim($rows['country_id']));
    $country_name = mysqli_real_escape_string($conn, trim($rows['country_name']));
    $league_id = mysqli_real_escape_string($conn, trim($rows['league_id']));
    $league_name = mysqli_real_escape_string($conn, trim($rows['league_name']));
    $match_date = mysqli_real_escape_string($conn, trim($rows['match_date']));
    $match_status = mysqli_real_escape_string($conn, trim($rows['match_status']));
    $match_time = mysqli_real_escape_string($conn, trim($rows['match_time']));
    $match_hometeam_name = mysqli_real_escape_string($conn, trim($rows['match_hometeam_name']));
    $match_hometeam_score = mysqli_real_escape_string($conn, trim($rows['match_hometeam_score']));
    $match_awayteam_name = mysqli_real_escape_string($conn, trim($rows['match_awayteam_name']));
    $match_awayteam_score = mysqli_real_escape_string($conn, trim($rows['match_awayteam_score']));
    $match_hometeam_halftime_score = mysqli_real_escape_string($conn, trim($rows['match_hometeam_halftime_score']));
    $match_awayteam_halftime_score = mysqli_real_escape_string($conn, trim($rows['match_awayteam_halftime_score']));
    $match_live= mysqli_real_escape_string($conn, trim($rows['match_live']));




$sql = "INSERT INTO matches (match_id, country_id, country_name, league_id, league_name, match_date, match_status, match_time, match_hometeam_name, match_hometeam_score, match_awayteam_name, match_awayteam_score, match_hometeam_halftime_score, match_awayteam_halftime_score, match_live)
      VALUES('$match_id', '$country_id', '$country_name', '$league_id', '$league_name', '$match_date', '$match_status', '$match_time', '$match_hometeam_name', '$match_hometeam_score', '$match_awayteam_name', '$match_awayteam_score', '$match_hometeam_halftime_score', '$match_awayteam_halftime_score', '$match_live')

ON DUPLICATE KEY UPDATE match_status = '$match_status', match_hometeam_score = '$match_hometeam_score', match_awayteam_score = '$match_awayteam_score', match_hometeam_halftime_score = '$match_hometeam_halftime_score', match_awayteam_halftime_score = '$match_awayteam_halftime_score', match_live = '$match_live'";

    
 mysqli_query($conn, $sql);

 
 
 }

$time_end = microtime(true);

$execution_time = ($time_end - $time_start);

echo $execution_api_time+$execution_time;

?>

