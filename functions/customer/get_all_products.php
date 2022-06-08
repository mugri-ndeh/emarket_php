<?php

include_once("../customer_functions.php");

$result = getAllProducts();

$data = array(
    'state'=>$result,
);

echo json_encode($data);