<?php
include_once('../../settings/connection.php');

function uploadImage(){}
function deleteImage(){}

//ok
function createStore($seller_id, $name){

    $conn = openConn();
    $sql = 'INSERT INTO shop (seller_id, name) VALUES (?,?)';
    $stmt = $conn->prepare($sql);
    $res = $stmt->execute([$seller_id, $name]);

    if ($res) {
        return 'success';
        }
       else {
          return 'failed';
       }

}
function deleteStore(){}

//ok
function viewStores($seller_id){
    $conn = openConn();
    $sql = 'SELECT * FROM shop WHERE seller_id = ?';
    $stmt = $conn->prepare($sql);
    $stmt->execute([$seller_id]);
    $row = $stmt->rowCount();

    if($row>0){
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    else {
        return 'failed';
    }
    
}

//nope
function updateStore($seller_id, $name){

    $conn = openConn();
    $sql = 'UPDATE shop SET shop.name = ? WHERE seller_id = ?';
    $stmt = $conn->prepare($sql);
    $stmt->execute([$seller_id, $name]);
    $row = $stmt->rowCount();

    if($row>0){
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        var_dump($data);
        return $data;
    }
    else {
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        var_dump($data);
        return 'failed';
    }
}

//ok
function addProducts($category_id, $name, $price, $image, $shop_id, $quantity){
    $conn = openConn();
    $sql = 'INSERT INTO products (category_id, name, price, image, shop_id, quantity) VALUES (?, ?, ?, ?, ?, ?)';
    $stmt = $conn->prepare($sql);
    $res = $stmt->execute([$category_id, $name, $price, $image, $shop_id, $quantity]);

    if ($res) {
        return 'success';
        }
       else {
          return 'failed';
       }

}


function deleteProduct($shop_id){
    $conn = openConn();
    $sql = 'DELETE FROM products WHERE shop_id = ?';
    $stmt = $conn->prepare($sql);
    $stmt->execute([$shop_id]);
    $row = $stmt->rowCount();

    if($row>0){
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    else {
        return 'failed';
    }
}

//ok
function viewProducts($uid, $shop_id){
    $conn = openConn();
        $sql = 'SELECT * FROM products WHERE shop_id = ?';
    $stmt = $conn->prepare($sql);
    $stmt->execute([$uid]);
    $row = $stmt->rowCount();

    if($row>0){
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    else {
        return 'failed';
    }
    
}
function viewAllProducts($shop_id){}



function createPromotion($product_id){

}
function getPromotion(){}
function getShopReview($shop_id){}

//ok
function getReviews($shop_id){

    $conn = openConn();

    $sql = " SELECT ratings.rating, ratings.review FROM ratings INNER JOIN shop ON ratings.shop_id = ?";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute(array($shop_id));
    $row = $stmt->rowCount();

    if($row>0){
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    else {
        return 'failed';
    }
    
}

function getInvoice(){}

function completeOrder(){} 
function makeReview(){}
function deleteReview(){}
function updatePassword(){}
function resetPassword(){}
function search(){}

function seeStores(){}