<?php
include_once('../../settings/connection.php');

function uploadImage(){}
function deleteImage(){}

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
function viewStores(){}
function updateStore(){}

function addProducts(){}
function deleteProduct(){}
function viewProdeucts(){}


function createPromotion(){}
function getReviews(){}


function completeOrder(){} 
function makeReview(){}
function deleteReview(){}
function updatePassword(){}
function resetPassword(){}
function search(){}

function seeStores(){}