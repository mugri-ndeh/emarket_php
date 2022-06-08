<?php
include_once("../seller_functions.php");

    $jsonData = json_decode(file_get_contents("php://input"), true);

   
    $seller_id = $jsonData['seller_id'];
   

    $result = getPromotions($seller_id);

    $data = array(
        'state'=>$result,
    );
    

    echo json_encode($data);
