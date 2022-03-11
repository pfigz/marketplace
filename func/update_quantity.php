<?php

$quantities = $_SESSION['quantity'];
$updatedQuantities = $_POST;

$_SESSION['quantity'] = array_replace($quantities, $updatedQuantities);


