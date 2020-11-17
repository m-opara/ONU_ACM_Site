<?php

/* 
 * This used to create a non browser visible reference to the database as defined below
 */

define('ODB_USER', 'onuhosting_nodeMCU');
define('ODB_PASSWORD', 'WqFraH}INc1p');
define('ODB_HOST', '209.124.88.119'); //change '209.124.88.119' to 'localhost' upon upload to web server
define('ODB_NAME', 'onuhosting_nodeMCU_data_out');
$ApiKeyValue = "ESP8266MOD"; //dev defined

$dbc = @mysqli_connect(ODB_HOST, ODB_USER, ODB_PASSWORD, ODB_NAME)
or die('Could not connect to MySQL DB '.mysqli_connect_error());