<?php
include_once("../customer_functions.php");

    // $email = $_POST['email'];
    // $password = $_POST['password'];

    // var_dump($jsonData = json_decode(file_get_contents("php://input"), true));
   

    // $result = login($email, $password);
    // //pt the result and name in associative array to send back to front end

    // $data = array(
    //     'state'=>$result,
    // );
    

    // echo json_encode($data);

 

    $jsonData = json_decode(file_get_contents("php://input"), true);

    $email = $jsonData['email'];
    $password = $jsonData['password'];
   

    $result = login($email, $password);
    //pt the result and name in associative array to send back to front end

    $data = array(
        'state'=>$result,
    );
    

    echo json_encode($data);
