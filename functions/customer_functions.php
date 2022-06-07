<?php
include_once('../../settings/connection.php');

function signup($firstname, $lastname, $username, $email, $phonenumber, $password){

    $conn = openConn();
    $sql = "INSERT INTO user (firstname, lastname, username, email, phonenumber, password) VALUES (?, ?, ?, ?, ?, ?) ";


    $stmt = $conn->prepare($sql);
    $res = $stmt->execute([$firstname, $lastname, $username, $email, $phonenumber, $password]);
    $row = $stmt->rowCount();

    $last_id =  $conn->lastInsertId();
    $sql1 = "SELECT * FROM user WHERE id = ?";


   //if query works
    if ($res) {
        
        echo('Result exists');
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return 'success';
        }
       else {
          return 'failed';
       }
    
}


function login($email, $password){
    $conn = openConn();

    $sql = "SELECT * FROM user WHERE email = ? AND password = ?";

    $stmt = $conn->prepare($sql);
    $stmt->execute(array($email, $password));

    $row = $stmt->rowCount();

   //if query works
    if ($row>0) {
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
   
        return $data;
    }
       else {
          return 'failed';
       }
    
}

function getUser($id){
    $conn = openConn();

    $sql = "SELECT * FROM user WHERE id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->execute(array($id));
    $row = $stmt->rowCount();

   //if query works
    if ($row>0) {
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data;
        }
       else {
          return 'failed';
       }
}

function editProfile($firstname, $lastname, $username, $email, $phonenumber, $id){
    $conn = openConn();

    $sql = "UPDATE user SET firstname = ?, lastname = ?, username = ?, email = ?, phonenumber = ? WHERE id = ? ";

    $stmt = $conn->prepare($sql);
    $stmt->execute([$firstname, $lastname, $username, $email, $phonenumber, $id]);
    $row = $stmt->rowCount();

   //if query works
    if ($row>0) {
        $data = getUser($id);
        return $data;
        }
       else {
          return 'failed';
       }
}

function getAllProducts(){
    $conn = openConn();

    $sql = 'SELECT * FROM products';

    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $row = $stmt->rowCount();

    if($row>0){
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    else{
        return 'failed';
    }

}

function getNew(){}
function getSales(){}

function getOrders(){}
function createOrder(){}
function deleteOrder(){}
function completeOrder(){} 

function getReviews($id){
    $conn = openconn();

    $sql = 'SELECT * FROM ratings WHERE customer_id = ? ';

    $stmt = $conn->prepare($sql);
    $stmt->execute(array($id));
    $row = $stmt->rowCount();

    if($row>0){
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
}
function makeReview($customer_id, $seller_id, $rating, $review){
    $conn = openConn();

    $conn = openConn();
    $sql = "INSERT INTO ratings (customer_id, seller_id, rating, review,) VALUES (?, ?, ?, ?) ";


    $stmt = $conn->prepare($sql);
    $res = $stmt->execute([$customer_id, $seller_id, $rating, $review]);
    $row = $stmt->rowCount();

   //if query works
    if ($res) {
        return 'success';
        }
       else {
          return 'failed';
       }
}
function deleteReview($id){
    $conn = openconn();

    $sql = 'DELETE FROM ratings WHERE customer_id = ? ';

    $stmt = $conn->prepare($sql);
   $res = $stmt->execute(array($id));

    if($res){
        
        return 'success';
    }
}

function updatePassword($old_password, $new_password){
    $conn = openconn();

    $sql = 'UPDATE users SET password = ? WHERE customer_id = ? ';

    $stmt = $conn->prepare($sql);
   $res = $stmt->execute(array($new_password, $old_password));

    if($res){
        return 'success';
    }
}
function resetPassword(){}
function search(){}

function seeStores(){}