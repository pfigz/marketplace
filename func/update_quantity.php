<?php

require '../includes/init.php';

$url = new Url;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $quantities = $_SESSION['quantity'];
    $updatedQuantities = $_POST;

    $_SESSION['quantity'] = array_replace($quantities, $updatedQuantities);

    $url->redirect('/public/views/cart.php');

}




