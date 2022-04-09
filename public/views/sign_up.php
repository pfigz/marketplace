<?php 

require '../../includes/init.php';

$auth = new Auth;

$customer = new Customer;

$url = new Url;

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $conn = require '../../includes/db.php';

    $customer->username = $_POST['username'];
    $customer->email    = $_POST['email'];
    $customer->password = $_POST['password'];

    $customer->create($conn);

    if ($customer->authenticate($conn, $_POST['username'], $_POST['password'])) {

        $auth->login($_POST['username']);

        $url->redirect('/');

    }
}

?>

<?php require '../../includes/header.php' ?>

<div class="container d-flex flex-column p-5">
    <div class="d-flex justify-content-center mb-2">
        <h2>Sign up here!</h2>
    </div>
    <div class="d-flex justify-content-center">
        <h6><strong>**Please do not enter personal information! This site is for testing/education only**</strong></h6>
    </div>
</div>

<div class="container d-flex justify-content-center mb-5 mt-5">
    <h5>Already have an account? Please <a href="/public/views/login.php">log in</a>.</h5>
</div>

    <div class="container d-flex justify-content-center">
        <form method="POST" class="needs-validation" id="signUp">
            <div class="form-floating">
                <div class="invalid-feedback">
                        Your username is required.
                </div>
                <input type="text" class="form-control" id="username" name="username" placeholder="Enter a username">
                <label for="floatingInput">Username</label>       
            </div>

            <div class="form-floating">
                <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com">
                <label for="floatingInput">Email address</label>
                <div class="invalid-feedback">
                    Your email is required.
                </div>
            </div>

            <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password">
                <label for="floatingPassword">Password</label>
                <div class="invalid-feedback">
                    Your password is required.
                </div>
            </div>

            <button class="w-100 btn btn-lg btn-outline-dark" type="submit">Sign up</button>
        </form>
    </div>

<?php require '../../includes/footer.php' ?>
