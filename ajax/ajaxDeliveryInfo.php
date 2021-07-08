<?php 
include '../includes/db.php';
include '../classes/DeliveryInfo.php';
if (isset($_POST['getdelivery'])){
    $book = new DeliveryInfo($conn);
    $array = $book->getDeliveryInfo($_POST['user_id']);
    echo json_encode($array);
}
elseif (isset($_POST['update'])){
    $book = new DeliveryInfo($conn);
    $book->updateDeliveryInfo($_POST['deliID'],$_POST['name'],$_POST['address'],$_POST['phone']);
}
elseif (isset($_POST['create'])){
    $book = new DeliveryInfo($conn);
    $id = $book->createDeliveryInfo($_POST['name'],$_POST['address'],$_POST['phone'],$_POST['userid']);
    echo $id;
}
elseif (isset($_POST['delete'])){
    $book = new DeliveryInfo($conn);
    $book->deleteDelivery($_POST['deliID']);
} ?>