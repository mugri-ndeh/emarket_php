<?php

include_once("../customer_functions.php");


$jsonData = json_decode(file_get_contents("php://input"), true);


 $customer_id = $jsonData['customer_id'];
 $shop_id = $jsonData['shop_id'];
 $date = $jsonData['date'];
 $state = $jsonData['state'];
 $items =  ($jsonData['items']);

$result = createOrder($customer_id, $shop_id, $date, $state, $items);

$data = array(
    'state'=>$result,
);


echo json_encode($data);