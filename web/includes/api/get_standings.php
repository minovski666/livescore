<?php

include "../db.php";

$league_id = $_GET['league_id'];
if (isset($league_id) && !empty($league_id)) {

    $query = "SELECT * FROM standings WHERE league_id='$league_id'";

    $select_query = mysqli_query($conn, $query);

    $data = array();

    while ($row = mysqli_fetch_assoc($select_query)) {

        $country_name = $row['country_name'];
        $league_id = $row['league_id'];
        $league_name = $row['league_name'];
        $team_name = $row['team_name'];
        $overall_league_position = $row['overall_league_position'];
        $overall_league_payed = $row['overall_league_payed'];
        $overall_league_W = $row['overall_league_W'];
        $overall_league_D = $row['overall_league_D'];
        $overall_league_L = $row['overall_league_L'];
        $overall_league_GF = $row['overall_league_GF'];
        $overall_league_GA = $row['overall_league_GA'];
        $overall_league_PTS = $row['overall_league_PTS'];
        $home_league_position = $row['home_league_position'];
        $home_league_payed = $row['home_league_payed'];
        $home_league_W = $row['home_league_W'];
        $home_league_D = $row['home_league_D'];
        $home_league_L = $row['home_league_L'];
        $home_league_GF = $row['home_league_GF'];
        $home_league_GA = $row['home_league_GA'];
        $home_league_PTS = $row['home_league_PTS'];
        $away_league_position = $row['away_league_position'];
        $away_league_payed = $row['away_league_payed'];
        $away_league_W = $row['away_league_W'];
        $away_league_D = $row['away_league_D'];
        $away_league_L = $row['away_league_L'];
        $away_league_GF = $row['away_league_GF'];
        $away_league_GA = $row['away_league_GA'];
        $away_league_PTS = $row['away_league_PTS'];

        $data[] = $row;
    }
    $response = array("status" => "success", "data" => $data);
    echo json_encode($response);
    exit;
}