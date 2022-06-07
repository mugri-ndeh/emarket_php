<?php
include_once('../../settings/connection.php');

function signup($username, $email, $password){

    $conn = openConn();
    $completed = 0;

    $sql = "INSERT INTO users (username, email, password, completedProfile) VALUES (?, ?, ?, ?) ";


    $stmt = $conn->prepare($sql);
    $res = $stmt->execute([$username, $email, $password, $completed]);
    $row = $stmt->rowCount();

   //if query works
    if ($res) {
        return 'success';
    }
       else {
          return 'failed';
       }
    
}

function completeProfile($firstname, $lastname, $phonenumber, $accountType, $region, $town, $quarter){

    $conn = openConn();
    $completed = 1;

//insert location first 
    $query = "INSERT INTO locations (region, town, quarter) VALUES (?, ?, ?) ";
    $statement = $conn->prepare($query);
    $res = $statement->execute([$region, $town, $quarter]);


   //if query works
    if ($res) {
        
        //update users now
        $last_id =  $conn->lastInsertId();

        $sql = "UPDATE  users SET firstName = ?, lastName = ?, phoneNumber = ?, accountType = ?, completedProfile = ?, location_id = ? ";

        $stmt = $conn->prepare($sql);
        $result = $stmt->execute([$firstname, $lastname, $phonenumber, $accountType, $completed, $last_id]);

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


function login($email, $password){
    $conn = openConn();

    $sql = "SELECT * FROM users WHERE email = ? AND password = ?";

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

    $sql = "SELECT * FROM users WHERE uid = ?";

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

    $sql = "UPDATE users SET firstName = ?, lastName = ?, username = ?, email = ?, phoneNumber = ? WHERE id = ? ";

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
function makeReview($customer_id, $shop_id, $rating, $review){
    $conn = openConn();

    $sql = "INSERT INTO ratings (customer_id, shop_id, rating, review) VALUES (?, ?, ?, ?) ";


    $stmt = $conn->prepare($sql);
    $res = $stmt->execute([$customer_id, $shop_id, $rating, $review]);
    $row = $stmt->rowCount();

   //if query works
    if ($res) {
        echo $res;
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