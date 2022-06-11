<?php

include_once("../customer_functions.php");


$jsonData = json_decode(file_get_contents("php://input"), true);

$id = $_POST['id'];

$result = getOrders($id);

// var_dump($id);
$data = array(
    'state'=>$result,
);


echo json_encode($data);