<?php
session_start();
$conn_string="host=web0.eecs.uottawa.ca port=15432 dbname=qyang034 user=qyang034 password=Y!qf19940329";

$dbconn=  pg_connect($conn_string) or die('Connection failed');
?>