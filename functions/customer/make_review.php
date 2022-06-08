<?php

include_once("../customer_functions.php");


$jsonData = json_decode(file_get_contents("php://input"), true);

$customer_id = $jsonData['customer_id'];
$shop_id = $jsonData['shop_id'];
$rating = $jsonData['rating'];
$review = $jsonData['review'];

$result = makeReview($customer_id, $shop_id, $rating, $review);

$data = array(
    'state'=>$result,
);


echo json_encode($data);