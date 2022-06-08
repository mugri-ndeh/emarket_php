<?php

include_once("../customer_functions.php");


$jsonData = json_decode(file_get_contents("php://input"), true);


 $customer_id = $jsonData['customer_id'];
 $state = $jsonData['state'];

$result = changeOrderState($customer_id, $state);

$data = array(
    'state'=>$result,
);


echo json_encode($data);