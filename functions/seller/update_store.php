<?php
include_once("../seller_functions.php");

    $jsonData = json_decode(file_get_contents("php://input"), true);

    $uid = $jsonData['seller_id'];
    $name = $jsonData['name'];

   

    $result = updateStore($uid, $name);
    //pt the result and name in associative array to send back to front end

    $data = array(
        'state'=>$result,
    );
    

    echo json_encode($data);
