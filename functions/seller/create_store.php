<?php
include_once("../seller_functions.php");

    $jsonData = json_decode(file_get_contents("php://input"), true);

    $seller_id = $_POST['seller_id'];
    $name = $_POST['name'];
    $imageUrl = $_POST['shop_img'];


    $image = $_FILES['image']['name'];


    $path = "../../uploads/shop/$name/$seller_id/shop_img/";
    $path1 = "uploads/shop/$name/$seller_id/shop_img/";
    if (!is_dir($path)) {
        mkdir($path, 0755, true);
    }

    $imgPath = "$path".$image;
    $imgPath1 = "$path1".$image;

    $tmp_name = $_FILES['image']['tmp_name'];


    $imresult = move_uploaded_file($tmp_name, $imgPath);
   

    $result = createStore($seller_id, $name, $imgPath1);
    //pt the result and name in associative array to send back to front end

    $data = array(
        'state'=>$result,
        'image'=>$imresult
    );
    

    echo json_encode($data);
