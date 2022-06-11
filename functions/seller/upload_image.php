<?php
include_once("../seller_functions.php");

    $jsonData = json_decode(file_get_contents("php://input"), true);

    $image = $_FILES['image']['name'];
    $name = $_POST['name'];


echo $name;
    // $path = "sample/path/newfolder";
    // if (!is_dir($path)) {
    //     mkdir($path, 0777, true);
    // }

    $imgPath = '../../uploads/'.$image;
    $tmp_name = $_FILES['image']['tmp_name'];

    $result = move_uploaded_file($tmp_name, $imgPath);
    

   
    

    echo json_encode($result);
