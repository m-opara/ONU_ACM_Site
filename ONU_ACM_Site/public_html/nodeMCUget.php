<?php
    require_once('../nodeMCU_in_mysqli_connect.php');
    $sql = "SELECT red_value, green_value, blue_value FROM NodeMCUData WHERE id='1'"; //The query for the database

    $result = $dbc->query($sql); //The result returned from querying the database
    if($result->num_rows > 0){ //if the number of rows returned is greater than 0 (we got some result)
        while($row = $result->fetch_assoc()) {
            
            echo $row["red_value"] . "\n" .  $row["green_value"] . "\n" . $row["blue_value"]; //output in the format the NodeMCU is expecting
        }
        $result->free();
    }
    $dbc->close();
?>