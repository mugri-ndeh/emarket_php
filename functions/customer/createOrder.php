<?php

include_once("../customer_functions.php");


$jsonData = json_decode(file_get_contents("php://input"), true);


 $customer_id = $_POST['customer_id'];
 $shop_id = $_POST['shop_id'];
 $date = $_POST['date'];
 $state = $_POST['state'];
 $items =  json_decode($_POST['items']);
 $qty = $_POST['qty'];
 $priceTotal = $_POST['price_total'];

$result = createOrder($customer_id, $shop_id, $date, $state, $items, $qty, $priceTotal);

$data = array(
    'state'=>$result,
);


echo json_encode($data);