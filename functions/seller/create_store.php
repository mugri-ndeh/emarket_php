<?php
include_once("../seller_functions.php");

    $jsonData = json_decode(file_get_contents("php://input"), true);

    $seller_id = $jsonData['seller_id'];
    $name = $jsonData['name'];
   

    $result = createStore($seller_id, $name);
    //pt the result and name in associative array to send back to front end

    $data = array(
        'state'=>$result,
    );
    

    echo json_encode($data);
