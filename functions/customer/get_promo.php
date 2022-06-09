<?php

include_once("../customer_functions.php");

$result = getPromo();

$data = array(
    'state'=>$result,
);

echo json_encode($data);