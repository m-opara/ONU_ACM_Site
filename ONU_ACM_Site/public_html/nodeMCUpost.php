<?php

require_once('../nodeMCU_out_mysqli_connect.php');
$index = 1;

$passedApiKey = $sensor = $tempValue = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $passedApiKey = formatPassed($_POST["api_key"]);

    if($passedApiKey == $ApiKeyValue){
        $sensor = formatPassed($_POST["sensor"]);
        $tempValue = formatPassed($_POST["tempValue"]);

        $sql = "REPLACE INTO `NodeMCUData` (`id`, `sensor`, `temp_value`) VALUES ('" . $index . "','" . $sensor . "','" . $tempValue . "')";
        
        $response = $dbc->query($sql);

        if($response){
            echo "New record created successfully";
        } else{
            echo "Error: " . $sql . "<br>" . $dbc->error;
        }

        $dbc->close();
    } else{
        echo "Incorrect API Key.";
    }
} else{
    echo "No Data Posted.";
}

function formatPassed($data){
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}