<?php
    session_start();
    require "logic/db_connection.php"
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>The Shop · Shop</title>
        <link href="../assets/bootstrap/assets/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="../assets/bootstrap/assets/dist/js/bootstrap.bundle.min.js"></script>    
    </head>

    <body class="container">
        <header class="d-flex justify-content-center py-3 mb-4 border-success border-bottom">
            <a href="../index.html" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none logo">
                <span class="fs-4">The Shop</span>
            </a>

            <ul class="nav nav-pills">
                <li class="nav-item p-1"><a href="./products_index.php" class="nav-link text-dark">Products</a></li>
                <li class="nav-item p-1"><a href="../static_pages/contact.html" class="nav-link text-dark">Contact us</a></li>
                <li class="nav-item p-1"><a href="../static_pages/about.html" class="nav-link text-dark">About us</a></li>
            </ul>
        </header>

        <div class="container mt-5">
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
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>
                                Edit Product
                                <a href="./products_index.php" class="btn btn-success float-end">BACK</a>
                            </h4>
                        </div>
                        <div class="card-body">

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
                                            <div class="mb-3">
                                                <label>Product title</label>
                                                <input type="text" class="form-control" name="title" value="<?php $product['title']; ?>" required >
                                            </div>

                                            <div class="mb-3">
                                                <label>Product description</label>
                                                <input type="text" class="form-control" name="description" value="<?php $product['description']; ?>" required >
                                            </div>

                                            <div class="mb-3">
                                                <label>Product price</label>
                                                <input type="price" class="form-control" name="price" value="<?php $product['price']; ?>" required >
                                            </div>

                                            <div class="mb-3">
                                                <label>Availability</label>
                                                <input type="text" class="form-control" name="available"  value="<?php $product['available']; ?>" required >
                                            </div>

                                            <div class="mb-3">
                                                <button type="submit" class="btn btn-success" name="edit_product">Update product</button>
                                            </div>
                                        </form>
                                        
                            <?php
                                    }   else {
                                        echo "<h4>Product does not exist</h4>";
                                    }
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>