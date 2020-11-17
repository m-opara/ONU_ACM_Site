<?php

/* 
 * This used to create a non browser visible reference to the database as defined below
 */

define('IDB_USER', 'onuhosting_nodeMCU');
define('IDB_PASSWORD', 'WqFraH}INc1p');
define('IDB_HOST', '209.124.88.119'); //change '209.124.88.119' to 'localhost' upon upload to web server
define('IDB_NAME', 'onuhosting_nodeMCU_data_in');
$ApiKeyValue = "ESP8266MOD"; //dev defined

$dbc = @mysqli_connect(IDB_HOST, IDB_USER, IDB_PASSWORD, IDB_NAME)
or die('Could not connect to MySQL DB '.mysqli_connect_error());