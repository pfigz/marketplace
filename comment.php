<?php

require 'includes/init.php';

$conn = require 'includes/db.php';

$auth = new Auth;

$product = new Product;

$url = new Url;

$comment = new Comment;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $comment->productID = $_POST['productID'];
    $comment->username = $_SESSION['username'];
    $comment->comment = $_POST['comment'];
    $comment->rating = $_POST['rating'];

    $comment->createComment($conn);

    $url->redirect("/marketplace/public/views/product.php?productID=$comment->productID");
}