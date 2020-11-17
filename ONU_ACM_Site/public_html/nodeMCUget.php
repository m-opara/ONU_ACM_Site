<?php
    require_once('../nodeMCU_in_mysqli_connect.php');
    $sql = "SELECT red_value, green_value, blue_value FROM NodeMCUData WHERE id='1'";

    $result = $dbc->query($sql);
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()) {
            
            echo $row["red_value"] . "\n" .  $row["green_value"] . "\n" . $row["blue_value"];
        }
        $result->free();
    }
    $dbc->close();
?>