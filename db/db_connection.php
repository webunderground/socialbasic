<?php
require_once('mysql.php');

$serverhost = "localhost";
$serveruser = "root";
$serverpwd  = "password";
$dbname     = "fce";

$MyDb       = new cMysqlDB($serverhost,$serveruser,$serverpwd,$dbname);
?>
