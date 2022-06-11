<?php
include_once("../seller_functions.php");

    $jsonData = json_decode(file_get_contents("php://input"), true);

    $category_id = $_POST['category_id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $image = $_POST['image'];
    $shop_id = $_POST['shop_id'];
    $quantity = $_POST['quantity'];
   

    $result = addProducts($category_id, $name, $price, $image, $shop_id, $quantity);
    //pt the result and name in associative array to send back to front end

    $data = array(
        'state'=>$result,
    );
    

    echo json_encode($data);
