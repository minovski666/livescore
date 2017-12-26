<?php

include "../db.php";

$match_id = $_GET['match_id'];

$data = array();

if (isset($match_id) && !empty($match_id)) {

    $query_cards = "SELECT match_id, card_time as time, home_fault, card, away_fault FROM cards WHERE match_id='$match_id'";

    $select_query_cards = mysqli_query($conn, $query_cards);

    while ($row = mysqli_fetch_assoc($select_query_cards)) {
        $row['type'] = 'card';
        $card_time = $row['time'];
        $home_fault = $row['home_fault'];
        $card = $row['card'];
        $away_fault = $row['away_fault'];

        $data[] = $row;
    }



    $query_goals = "SELECT match_id, score_time as time, home_scorer, away_scorer FROM goalscorers WHERE match_id='$match_id'";

    $select_query_goals = mysqli_query($conn, $query_goals);



    while ($row = mysqli_fetch_assoc($select_query_goals)) {

        $row['type'] = 'goal';
        $score_time = $row['time'];
        $home_scorer = $row['home_scorer'];
        $away_scorer = $row['away_scorer'];


        $data[] = $row;
    }


    $response = array("status" => "success", "data" => $data);
    echo json_encode($response);
    exit;
}