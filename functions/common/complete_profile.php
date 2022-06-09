<?php
include_once("../customer_functions.php");

$jsonData = json_decode(file_get_contents("php://input"), true);


 $firstname = $_POST['firstName'];
 $lastname = $_POST['lastName'];
 $phonenumber = $_POST['phoneNumber'];
 $accountType = $_POST['accountType'];
 $region = $_POST['region'];
 $town = $_POST['town'];
 $quarter = $_POST['quarter'];
 $uid = $_POST['uid'];

 $result = completeProfile($uid, $firstname, $lastname, $phonenumber, $accountType, $region, $town, $quarter);

 $data = array(
    'state'=>$result,
);


echo json_encode($data);
