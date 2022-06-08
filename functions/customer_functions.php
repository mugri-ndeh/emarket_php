<?php
include_once('../../settings/connection.php');

//ok
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
//ok
function completeProfile($firstname, $lastname, $phonenumber, $accountType, $region, $town, $quarter){

    $conn = openConn();
    $completed = 1;


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

//ok
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

//ok
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

//ok
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

//ok
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

//ok
function getSales(){
    $conn = openConn();

    $sql = 'SELECT * FROM promotions';

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

//ok
function getOrders($id){
    $conn = openConn();

    $sql = 'SELECT * FROM orders WHERE customer_id = ?';

    $stmt = $conn->prepare($sql);
    $stmt->execute(array($id));
    $row = $stmt->rowCount();

    if($row>0){
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    else{
        return 'failed';
    }
}

//ok
function insertOrderItem($product_id, $order_id){
    $conn = openConn();

    $query = 'INSERT INTO product_order (product_id, order_id) VALUES (?, ?)';
    $stmt = $conn->prepare($query);
    $res = $stmt->execute([$product_id, $order_id]);
    $row = $stmt->rowCount();

   //if query works
    if ($res) {
        echo 'GOOD';
    }
       else {
          echo 'failed';
       }

}

//ok
function createOrder($customer_id, $shop_id, $date, $state, array $items){
    $conn = openConn();

    $sql = 'INSERT INTO orders (customer_id, shop_id, date, state) VALUES (?, ?, ?, ?)';

    $stmt = $conn->prepare($sql);
    $res = $stmt->execute([$customer_id, $shop_id, $date, $state]);
    

    if($res){
        $last_id = $conn->lastInsertId();
        for($i = 0; $i < sizeof($items); $i++){
            insertOrderItem($items[$i], $last_id);
        }
        return 'success';
    }
    else{
        return 'failed';
    }
}
//
function changeOrderState($customer_id, $state){
    $conn = openConn();

    $sql = 'UPDATE orders SET state = ? WHERE customer_id = ?';
    $stmt = $conn->prepare($sql);
    $stmt->execute([$state, $customer_id]);

    $row = $stmt->rowCount();

    var_dump($row);
    //if query works
     if ($row>0) {
         
        return 'success';
     }
        else {
           return 'failed';
        }
    

}
//ok
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

//ok
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

//nt yet
function deleteReview($id){
    $conn = openconn();

    $sql = 'DELETE FROM ratings WHERE id = ? ';

    $stmt = $conn->prepare($sql);
   $res = $stmt->execute(array($id));

    if($res){
        
        return 'success';
    }
}

//ok
function updatePassword($old_password, $new_password, $id){
    $conn = openconn();

    $sql = 'UPDATE users SET password = ? WHERE uid = ? AND password = ?';

    $stmt = $conn->prepare($sql);
   $res = $stmt->execute(array($new_password, $id, $old_password));

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

//ok
function resetPassword($new_password, $id){

    $conn = openconn();

    $sql = 'UPDATE users SET password = ? WHERE uid = ? ';

    $stmt = $conn->prepare($sql);
    $res = $stmt->execute(array($new_password, $id));
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


function search(){}
function searchWithFilter(){}

//ok
function seeStores(){
    $conn = openconn();

    $sql = 'SELECT * FROM shop';
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