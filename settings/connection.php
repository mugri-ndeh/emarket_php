<?php
   // display errors if any
   error_reporting(E_ALL);
   ini_set('display_errors', 1);
   
   // function to open connection
  function openConn(){
   $host = "localhost";
   $user = "root";
   $password = "";
   $db = "emarket";
   
//    if(!$conn){
//       die("Connect failed:".mysqli_error());
//    }
  
//    echo "Connected";
//    return $conn;
//   }

  try
  {
    $conn = new PDO("mysql:host=$host; dbname=$db;charset=UTF8;", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $conn;
  }
  catch(PDOException $exception)
  {
      echo "Connection error: " . $exception->getMessage();
  }
   
}