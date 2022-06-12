<?php

include_once("../customer_functions.php");
include_once('../settings/connection.php');


$id = $_POST["id"];

$conn = openConn();

$sql = 'SELECT locations.town, locations.region, locations.quarter FROM ((shop INNER JOIN users ON shop.seller_id = users.uid WHERE shop.seller_id = ?) INNER JOIN locations ON users.location_id = locations.id)';
$stmt = $conn->prepare($sql);
$stmt->execute([$shop_id]);
$row = $stmt->rowCount();

if($row>0){
    $data = $stmt->fetch(PDO::FETCH_ASSOC);

    $data = array(
        'state'=>$$data,
    );

    echo json_encode($data);
}
else {

    $data = array(
        'state'=>'failed',
    );

    echo json_encode($data);
}



