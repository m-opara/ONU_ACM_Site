<?php

require_once('../nodeMCU_out_mysqli_connect.php');
$index = 1;

$passedApiKey = $sensor = $tempValue = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){ //set things up to get data from a post request
    $passedApiKey = formatPassed($_POST["api_key"]); //get the passed password from the NodeMCU

    if($passedApiKey == $ApiKeyValue){ //used for security to validate that actions are only done if we get the correct password 
        //get and submit the rest of the data
        $sensor = formatPassed($_POST["sensor"]);
        $tempValue = formatPassed($_POST["tempValue"]);

        $sql = "REPLACE INTO `NodeMCUData` (`id`, `sensor`, `temp_value`) VALUES ('" . $index . "','" . $sensor . "','" . $tempValue . "')";
        
        $response = $dbc->query($sql); //the result of the attempt to put the data in the database

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