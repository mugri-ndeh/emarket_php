<?php
include_once("../customer_functions.php");

    $jsonData = json_decode(file_get_contents("php://input"), true);

    $id = $jsonData['id'];

    $result = getUser($id);
    //pt the result and name in associative array to send back to front end

    $data = array(
        'state'=>$result,
    );
    

    echo json_encode($data);
