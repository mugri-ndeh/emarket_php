<?php

include_once("../customer_functions.php");

$id = $_POST["id"];

$result = getShopProducts($id);

$data = array(
    'state'=>$result,
);

echo json_encode($data);