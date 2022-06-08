<?php

include_once("../customer_functions.php");


$jsonData = json_decode(file_get_contents("php://input"), true);

$id = $jsonData['id'];
$old_password = $jsonData['oldPassword'];
$new_password = $jsonData['newPassword'];

$result = updatePassword($old_password, $new_password, $id);

$data = array(
    'state'=>$result,
);


echo json_encode($data);