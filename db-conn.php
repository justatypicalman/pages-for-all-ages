<?php 


$sName = "localhost";

$uName = "root";

$pass = "";


$db_name = "pfaa_db";

$conn = mysqli_connect($sName, $uName, $pass, $db_name);
if($conn === false){
  die("ERROR: Could not connect. " . mysqli_connect_error());
}
