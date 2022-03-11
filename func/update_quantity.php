<?php

// require '../includes/init.php';

$url = new Url;

$quantities = $_SESSION['quantity'];
$updatedQuantities = $_POST;

$_SESSION['quantity'] = array_replace($quantities, $updatedQuantities);

// $url->redirect('/marketplace/public/views/cart.php');


