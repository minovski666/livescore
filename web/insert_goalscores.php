<?php include 'db.php';

	$url = 'https://apifootball.com/api/?action=get_events&from=2017-10-23&to=2017-12-31&APIkey=3927151cec0255e13d4d440dc5fe9ea5ca1584df169e5c6c7857a862dd01eaed';
    //read the json file contents
    $jsondata = file_get_contents($url);

    //convert json object to php associative array
    $data = json_decode($jsondata, true);



     //get the cards details
    foreach($data as $rows){
        $match_id= $rows['match_id'];
    foreach ($rows['goalscorer'] as $scorer) {
        
        $time = mysqli_real_escape_string($conn, trim($scorer['time']));
        $home_scorer = mysqli_real_escape_string($conn, trim($scorer['home_scorer']));
        $score = mysqli_real_escape_string($conn, trim($scorer['score']));
        $away_scorer = mysqli_real_escape_string($conn, trim($scorer['away_scorer']));
    
   

$sql_goalscorer = "INSERT INTO goalscorer(match_id, score_time, home_scorer, score, away_scorer)
      VALUES('$match_id', '$time', '$home_scorer', '$score', '$away_scorer')";

    
 mysqli_query($conn, $sql_goalscorer);
  }
    }

?>

