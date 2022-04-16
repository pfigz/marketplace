<?php

if (! isset($_SESSION['quantity']) && ! isset($_SESSION['price'])) {

    $_SESSION['quantity'] = [];
    $_SESSION['price'] = [];

}