<?php

$dbhost ="localhost";
$dbuser ="root";
$dbpassword ="";
$dbname ="swe30008";

if(!$con = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname))
{
    die();
}
