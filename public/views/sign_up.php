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

        $url->redirect('/marketplace/public/views/products.php');

    }
}

?>

<?php require '../../includes/header.php' ?>

<div class="container d-flex justify-content-center mt-5 mb-5">
    <h2>Please sign-up to view our products</h2>
</div>

    <div class="container d-flex justify-content-center">

        <form method="POST">
            <div class="username">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control mb-2" name="username" id="username" placeholder="Enter username" value="<?= $customer->username; ?>">
            </div>

            <div class="email">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control mb-2" name="email" id="email" placeholder="Enter your email address" value="<?= $customer->email; ?>">
            </div>

            <div class="password">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Enter a password" value="<?= $customer->password; ?>">
            </div>

            <div class="container d-flex justify-content-center mt-3">
                <button type="submit">Submit</button>
            </div>
            
        </form>

    </div>



<?php require '../../includes/footer.php' ?>