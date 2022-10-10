<?php
//create database 
$server = "localhost";
$username = "root";
$password1 = "";
$database = "cacti_succulent_kuching";
  
$conn = mysqli_connect($server,  $username, $password1, $database );

  if (!$conn){
     die( "<script>alert('Connection failed.')</script>");
  }
?>