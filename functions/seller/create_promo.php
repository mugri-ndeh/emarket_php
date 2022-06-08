<?php
include_once("../seller_functions.php");

    $jsonData = json_decode(file_get_contents("php://input"), true);

    $category_id = $jsonData['category_id'];
    $name = $jsonData['name'];
    $price = $jsonData['price'];
    $image = $jsonData['image'];
    $shop_id = $jsonData['shop_id'];
    $quantity = $jsonData['quantity'];
   

    $result = createPromotion($category_id, $name, $price, $image, $shop_id, $quantity);
    //pt the result and name in associative array to send back to front end

    $data = array(
        'state'=>$result,
    );
    

    echo json_encode($data);
