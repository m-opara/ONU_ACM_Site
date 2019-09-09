<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

define('DB_USER', 'onuhosti_User');
define('DB_PASSWORD', 'Klondike79');
define('DB_HOST', '162.249.4.107'); //change '162.249.4.107' to 'localhost' upon upload to web server
define('DB_NAME', 'onuhosti_members_database');

$dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
or die('Could not connect to MySQL DB '.mysqli_connect_error());
