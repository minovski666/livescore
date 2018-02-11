<?php include '../db.php';

	$url = 'https://apifootball.com/api/?action=get_events&from=2018-01-01&to=2018-12-31&APIkey=3927151cec0255e13d4d440dc5fe9ea5ca1584df169e5c6c7857a862dd01eaed';
    //read the json file contents
    $jsondata = file_get_contents($url);

    //convert json object to php associative array
    $data = json_decode($jsondata, true);



     //get the cards details
    foreach($data as $rows){
        $match_id= $rows['match_id'];
    foreach ($rows['cards'] as $cards) {
        
        $time = mysqli_real_escape_string($conn, trim($cards['time']));
        $home_fault = mysqli_real_escape_string($conn, trim($cards['home_fault']));
        $card = mysqli_real_escape_string($conn, trim($cards['card']));
        $away_fault = mysqli_real_escape_string($conn, trim($cards['away_fault']));
    
   

$sql_cards = "INSERT INTO cards(match_id, card_time, home_fault, card, away_fault)
      VALUES('$match_id', '$time', '$home_fault', '$card', '$away_fault')";


    
 mysqli_query($conn, $sql_cards);
  }
    }

?>
