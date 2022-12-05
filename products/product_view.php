<?php
    session_start();
    require "logic/db_connection.php"
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>The Farm · Buy</title>
        <link href="assets/styles/sidebars.css" rel="stylesheet">
        <link href="../assets/bootstrap/assets/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="../assets/styles/custom_styles.css">
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
            if (isset($_SESSION['message'])) : 
        ?>

                <div role="alert" class="alert alert-warning alert-dismissible fade show">
                    <strong>Holy water</strong> You should check in on others below.
                    <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

        <?php
            unset($_SESSION['message']);
            endif;
        ?>

        <?php
            if (isset($_GET['id'])) {
                $product_id = mysqli_real_escape_string($_GET['id']);
                $query = "SELECT * FROM products WHERE id = '$product_id";
                $query_run = mysqli_query($db_connection, $query);

                if (mysqli_num_rows(query_run) > 0) {
                    $product = mysqli_fetch_array($query_run);
        ?>
                    <form action="./logic/update_product.php" method="POST">
                        <input type="hidden" class="form-control" name="title" value="<?php $product['product_id']; ?>" required>
                        
                        <div class="px-4 pt-5 my-5 text-center">
                            <h1 class="display-4 fw-bold text-primary"><?php $product['title']; ?></h1>
                            <div class="col-lg-6 mx-auto">
                                <p class="lead mb-4"><?php $product['description']; ?>.</p>
                                <h4 class="text-primary mb-4">$<?php $product['price']; ?> EACH</h4>
                                <div class="d-grid gap-2 d-sm-flex justify-content-sm-center mb-5">
                                    <button type="button" class="btn btn-success btn-lg me-sm-3">
                                        <a href="./bought.html" class="text-white text-decoration-none">Place an order</a>
                                    </button>

                                    <div class="mb-3 col-md-3">
                                        <label>Items</label>
                                        <input type="number" name="items" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                                        
        <?php
                }   else {
                    echo "<h4>Product is not available</h4>";
                }
            }
        ?>
        
    </body>
</html>