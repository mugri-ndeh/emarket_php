<?php
include_once("../customer_functions.php");

$jsonData = json_decode(file_get_contents("php://input"), true);


 $username = $jsonData['username'];
 $email = $jsonData['email'];
 $password = $jsonData['password'];

 $result = signup($username, $email, $password);

 $data = array(
    'state'=>$result,
);


echo json_encode($data);