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
            <form method="POST" class="needs-validation" id="login">
                <div class="form-floating">
                    <div class="invalid-feedback">
                        Your username is required.
                    </div>
                    <input type="text" class="form-control" id="floatingUsername" name="username" placeholder="Username">
                    <label for="username">Username</label>
                </div>

                <div class="form-floating">
                    <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                </div>

                <div class="checkbox mb-3">
                    <label>
                        <input type="checkbox" value="remember-me"> Remember me
                    </label>
                </div>
                
                <button class="w-100 btn btn-lg btn-outline-dark" type="submit">Sign in</button>    
            </form>
        </div>
    </div>
</div>



<?php require '../../includes/footer.php' ?>