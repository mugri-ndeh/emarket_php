<?php
include_once("../seller_functions.php");

    $jsonData = json_decode(file_get_contents("php://input"), true);

    $category_id = $_POST['category_id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $image = $_POST['image'];
    $shop_id = $_POST['shop_id'];
    $quantity = $_POST['quantity'];

    $image = $_FILES['image']['name'];


    $path = "../../uploads/$shop_id/$name/shop_$shop_id/products/";
    $path1 = "uploads/$shop_id/$name/shop_$shop_id/products/";

    
    if (!is_dir($path)) {
        mkdir($path, 0755, true);
    }

    $imgPath = "$path".$image;
    $imgPath1 = "$path1".$image;

    $tmp_name = $_FILES['image']['tmp_name'];


    $imresult = move_uploaded_file($tmp_name, $imgPath);
   

    $result = addProducts($category_id, $name, $price, $imgPath1, $shop_id, $quantity);
    //pt the result and name in associative array to send back to front end

    $data = array(
        'state'=>$result,
    );
    

    echo json_encode($data);
