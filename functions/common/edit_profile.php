<?php

    include_once("../customer_functions.php");
    $firstname = $_POST['firstName'];
    $lastname = $_POST['lastName'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phonenumber = $_POST['phoneNumber'];
    $id = $_POST['uid'];
    
    $result  = editProfile($firstname, $lastname, $username, $email, $phonenumber, $id);

    $data = array(
        'state'=>$result,
    );
    

    echo json_encode($data);