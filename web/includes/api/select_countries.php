<?php include "includes/db.php";

$country_id= $_GET['country_id'];

	$query = "SELECT * FROM countries WHERE country_id='$country_id'";
  
            $select_query = mysqli_query($conn, $query);
          
            $rows = array();

        while ($row = mysqli_fetch_assoc($select_query)) {


    $country_id = $row['country_id'];
    $country_name = $row['country_name'];
    

                $rows[] = $row;

		}


         	echo $inJson = json_encode($rows);
			

?>