<?php

include_once("../customer_functions.php");


$jsonData = json_decode(file_get_contents("php://input"), true);



$result = seeStores();

$data = array(
    'state'=>$result,
);


echo json_encode($data);