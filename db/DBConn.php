<?php

function create_connection(){
  //connection properties
  $servername = "localhost"; //mysql.hostinger.co.uk
  $username = "root"; //"u795493454_admin";
  $password = "";
  $dbname = "bancoDB";  //u795493454_uifi
  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  if(!mysqli_query($conn, "SET NAMES UTF8")){
    echo $conn->error;
  }
  return $conn;
}
?>