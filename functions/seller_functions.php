<?php
include_once('../../settings/connection.php');

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

//not yet
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

//ok 
function viewAllProducts($seller_id){
    $conn = openConn();

    $sql = 'SELECT * FROM shop INNER JOIN products ON shop.seller_id = ?';
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


//ok
function createPromotion($category_id, $name, $price, $image, $shop_id, $quantity){
    $conn = openConn();

    $sql = 'INSERT INTO products (category_id, name, price, image, shop_id, quantity) VALUES (?, ?, ?, ?, ?, ?)';
    $stmt = $conn->prepare($sql);
    $res = $stmt->execute([$category_id, $name, $price, $image, $shop_id, $quantity]);

    if ($res) {
        $last_id =  $conn->lastInsertId();
        $sql1 = "INSERT INTO promotions (product_id) VALUES (?)";
        $stmt1 = $conn->prepare($sql1);
        $result = $stmt1->execute([$last_id]);

        if($result){
            return 'success';
    
        }else{
            return 'failed';
        }

    }
    else {
          return 'failed';
    }

}

//ok
function getPromotions($id){
    $conn = openConn();

    $sql = 'SELECT * FROM promotions WHERE seller_id = ?';

    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);
    $row = $stmt->rowCount();

    if($row>0){
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }else{
        return 'failed';
    }

}
//ok
function getShopReview($shop_id){

    
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
//
function getReviews($seller_id){

    $conn = openConn();

    $sql = " SELECT * FROM ratings INNER JOIN shop ON shop.seller_id = ?";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute(array($seller_id));
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
function uploadImage(){}
function deleteImage(){}

