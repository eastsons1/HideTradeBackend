<?php

$host = "localhost"; /* Host name */
$user = "eastsons_studylab"; /* User */
$password = "studyLab@321"; /* Password */
$dbname = "eastsons_studylab"; /* Database name */

$con = mysqli_connect($host, $user, $password,$dbname);
// Check connection
if (!$con) {
 die("Connection failed: " . mysqli_connect_error());
}