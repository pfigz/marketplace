<?php

require '../../includes/init.php';

$auth = new Auth;

$customer = new Customer;

$url = new Url;

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $conn = require '../../includes/db.php';

    if ($customer->authenticate($conn, $_POST['username'], $_POST['password'])) {

        $auth->login($_POST['username']);

        $url->redirect('/public/views/products.php');

    }
}

?>

<?php require '../../includes/header.php' ?>

<div class="container"> 
   
    <div class="container d-flex justify-content-center mb-5 mt-5">
        <h2>Please login</h2>
    </div>

    <div class="container d-flex justify-content-center mb-5 mt-5">
        <h5>Don't have an account? Please <a href="/public/views/sign_up.php">signup</a>.</h5>
    </div>

    <div class="container d-flex justify-content-center">
        <div class="login">   
            <form method="POST" id="login">
                <div class="username">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" name="username" id="username" placeholder="Enter username">
                </div>
    
                <div class="password">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Enter a password">
                </div>
    
                <div class="container d-flex justify-content-center mt-3">
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
            </form>   
        </div>
    </div>
</div>



<?php require '../../includes/footer.php' ?>