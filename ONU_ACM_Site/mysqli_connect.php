<?php

/* 
 * This used to create a non browser visible reference to the database as defined below
 */

define('DB_USER', 'onuhosti_User');
define('DB_PASSWORD', 'Klondike79');
define('DB_HOST', 'localhost'); //change '162.249.4.107' to 'localhost' upon upload to web server
define('DB_NAME', 'onuhosti_members_database');

$dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
or die('Could not connect to MySQL DB '.mysqli_connect_error());