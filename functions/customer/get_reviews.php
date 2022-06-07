<?php

include_once("../customer_functions.php");


$jsonData = json_decode(file_get_contents("php://input"), true);

$id = $jsonData['id'];

$result = getReviews($id);

$data = array(
    'state'=>$result,
);


echo json_encode($data);