<?php

include "includes/db.php";

$league_id = $_GET['league_id'];

$query = "SELECT * FROM leagues WHERE league_id='$league_id'";

$select_query = mysqli_query($conn, $query);

$rows = array();

while ($row = mysqli_fetch_assoc($select_query)) {


    $country_name = $row['country_name'];
    $league_id = $row['league_id'];
    $league_name = $row['league_name'];


    $rows[] = $row;
}


echo $inJson = json_encode($rows);
?>