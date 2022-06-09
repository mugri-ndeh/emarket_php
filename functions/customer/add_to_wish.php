<?php

include_once("../customer_functions.php");


$jsonData = json_decode(file_get_contents("php://input"), true);

$product_id = $jsonData['product_id'];
$customer_id = $jsonData['customer_id'];

$result = addToWish($product_id, $customer_id);

$data = array(
    'state'=>$result,
);


echo json_encode($data);