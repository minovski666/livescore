<?php include "../db.php";

$match_date = $_GET['match_date'];

if (isset($match_date) && !empty($match_date)) {
    $query = "SELECT * FROM matches WHERE match_date='$match_date'";
    $select_query = mysqli_query($conn, $query);

    $data = array();

    while ($row = mysqli_fetch_assoc($select_query)) {

        $match_id = $row['match_id'];
        $country_id = $row['country_id'];
        $country_name = $row['country_name'];
        $league_id = $row['league_id'];
        $league_name = $row['league_name'];
        $match_date = $row['match_date'];
        $match_status = $row['match_status'];
        $match_time = $row['match_time'];
        $match_hometeam_name = $row['match_hometeam_name'];
        $match_hometeam_score = $row['match_hometeam_score'];
        $match_awayteam_name = $row['match_awayteam_name'];
        $match_awayteam_score = $row['match_awayteam_score'];
        $match_hometeam_halftime_score = $row['match_hometeam_halftime_score'];
        $match_awayteam_halftime_score = $row['match_awayteam_halftime_score'];
        $match_live = $row['match_live'];

        $data[] = $row;
    }
    $response = array("status" => "success", "data" => $data);
    echo json_encode($response);
    exit;
}

