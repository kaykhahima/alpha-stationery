<?php
$dbHost = "localhost";
$dbUsername = "root";
$dbPwd = "MpA0o3i4fvD2iipo";
$dbName = "alpha_schema";

$db = mysqli_connect($dbHost, $dbUsername, $dbPwd, $dbName);
date_default_timezone_set("Africa/Dar_es_Salaam");
session_start();
?>