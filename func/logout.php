<?php

require '../includes/init.php';

$auth = new Auth;

$url = new Url;

$auth->logout();

session_destroy();

$url->redirect('/marketplace/');

