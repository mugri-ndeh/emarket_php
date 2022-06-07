<?php

$jsonData = json_decode(file_get_contents("php://input"), true);

$customer_id = $jsonData['customer_id'];
$seller_id = $jsonData['seller_id'];
$rating = $jsonData['rating'];
$review = $jsonData['review'];

$result = makeReview($customer_id, $seller_id, $rating, $review);

$data = array(
    'state'=>$result,
);

var_dump($jsonData);


echo json_encode($data);