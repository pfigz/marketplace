<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Tag to address insecure content warning -->
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="/public/assets/css/style.css">  
    <link rel="stylesheet" href="/public/assets/css/styleCart.css">  
    <title>My Marketplace App</title>
</head>
<body>
    
    <div class="container">

        <nav class="navbar navbar-expand-lg navbar-light bg-light mb-3">
            <div class="container-fluid d-flex">

                <a class="navbar-brand" href="/">The Marketplace</a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                               aria-controls="navbarSupportedContent"aria-expanded="false"aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">    
                        <?php if (! $auth->isLoggedIn()): ?>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="/public/views/products.php">View Products</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/public/views/cart.php">Shopping Cart</a>
                            </li>                       
                        <?php else: ?>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="/public/views/products.php">View Products</a>
                            </li>                       
                            <li class="nav-item">
                                <a class="nav-link" href="/public/views/add_product.php">Add Product</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/public/views/cart.php">Shopping Cart</a>
                            </li>                          
                        <?php endif; ?>
                    </ul>

                    <?php if (! $auth->isLoggedIn()): ?>                           
                        <li class="nav-item navbar-nav dropdown d-flex" >
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Hello, <?php echo "Guest" ;?>
                            </a>

                            <ul class="dropdown-menu bg-light" aria-labelledby="navbarDropdown">
                                <li>
                                    <a class="dropdown-item" href="/public/views/login.php">Login</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="/public/views/sign_up.php">Signup</a>
                                </li>
                            </ul>
                        </li>
                    <?php else : ?>
                        <li class="nav-item navbar-nav dropdown d-flex" >
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Hello, <?php echo $_SESSION['username']; ?>
                            </a>

                            <ul class="dropdown-menu bg-light" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="/func/logout.php">Logout</a></li>
                            </ul>
                        </li>        
                    <?php endif; ?>
                </div>
            </div>
        </nav> 

       <main>
              