<?php
include_once("../customer_functions.php");

$jsonData = json_decode(file_get_contents("php://input"), true);


 $firstname = $jsonData['firstname'];
 $lastname = $jsonData['lastname'];
 $phonenumber = $jsonData['phonenumber'];
 $accountType = $jsonData['accountType'];
 $region = $jsonData['region'];
 $town = $jsonData['town'];
 $quarter = $jsonData['quarter'];

 $result = completeProfile($firstname, $lastname, $phonenumber, $accountType, $region, $town, $quarter);

 $data = array(
    'state'=>$result,
);


echo json_encode($data);
