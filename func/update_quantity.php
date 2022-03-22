<?php

require '../includes/init.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") 
{
    $_SESSION['quantity'] = array_replace($_SESSION['quantity'], $_POST);
}
