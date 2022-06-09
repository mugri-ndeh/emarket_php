<?php
include_once("../customer_functions.php");

$jsonData = json_decode(file_get_contents("php://input"), true);


 $username = $_POST['username'];
 $email = $_POST['email'];
 $password = $_POST['password'];

 $result = signup($username, $email, $password);

 $data = array(
    'state'=>$result,
);


echo json_encode($data);