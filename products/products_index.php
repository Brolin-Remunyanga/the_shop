<?php
    require './logic/db_connection.php';
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>The Shop · Products available</title>
        <link href="assets/styles/sidebars.css" rel="stylesheet">
        <link href="../assets/bootstrap/assets/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="../assets/bootstrap/assets/dist/js/bootstrap.bundle.min.js"></script>
        <script src="../assets/bootstrap/assets/dist/js/bootstrap.bundle.min.js"></script>    
    </head>

    <body class="container">
        <header class="d-flex justify-content-center py-3 mb-4 border-success border-bottom">
            <a href="index.html" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none logo">
                <span class="fs-4">The Shop</span>
            </a>

            <ul class="nav nav-pills">
                <li class="nav-item p-1"><a href="./products/products_index.php" class="nav-link text-dark">Products</a></li>
                <li class="nav-item p-1"><a href="static_pages/contact.html" class="nav-link text-dark">Contact us</a></li>
                <li class="nav-item p-1"><a href="static_pages/about.html" class="nav-link text-dark">About us</a></li>
                <li class="nav-item p-1"><a href="login/login.html" class="nav-link bg-primary text-white" aria-current="page">Log in</a></li>
                <li class="nav-item bg-white p-1"><a href="registration/signup.html" class="nav-link bg-warning text-white" aria-current="page">Sign up</a></li>
            </ul>
        </header>

        <?php 
            isset($_SESSION['message']);
        ?>

        <h1 class="display-4 text-primary text-center mb-4">Products Available</h1>

        <div class="row mt-4 pt-4">

        <?php
            $query = "SELECT * FROM product";
            $query_run = mysqli_query($db_connection, $query);

            if (mysqli_num_rows(query_run) > 0) {
                foreach ($query_run as $product) {
        ?>
            <div class="col-6 col-sm-4 themed-grid-col">
                <div class="card text-center mb-4 rounded-3 shadow-lg">
                    <div class="card-header bg-success py-3">
                        <h4 class="my-0 text-white"><?php $product['title']; ?></h4>
                    </div>
                    <div class="card-body">
                        <p class="mt-3">
                            <?php $product['description']; ?>
                        </p>
                        <h1 class="card-title pricing-card-title mb-4">$<td><?php $product['price']; ?></td></h1>
                        <button type="button" class="w-100 btn btn-lg btn-outline-warning text-decoration-none"> 
                            <a href="./product_view.php?id=<?php $product['product_id']; ?>" class="text-warning text-decoration-none"> Buy</a>
                        </button>
                    </div>
                </div>
            </div>
        <?php
                }
            }   else {
                echo "<h5> No Products Are Available YEt! </h5>";
            }
        ?>
        </div>
        
    </body>
</html>