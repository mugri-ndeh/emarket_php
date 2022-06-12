<?php

include_once("../customer_functions.php");


$jsonData = json_decode(file_get_contents("php://input"), true);

$query = $_POST['query'];

$result = Search($query);

$data = array(
    'state'=>$result,
);


echo json_encode($data);