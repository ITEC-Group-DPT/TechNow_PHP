<?php 
include '../includes/db.php';
include '../classes/Order.php';
if (isset($_POST['order'])){
    $arr = json_decode($_POST['list']);
    $order = new Order($conn);
    $order->createOrder($_POST['name'],$_POST['address'],$_POST['phone'],$_POST['userid'],$arr,$_POST['total']);
}
