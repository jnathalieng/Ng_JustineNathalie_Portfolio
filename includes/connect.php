<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "root";
$dbname = "ng_portfolio";

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
