<?php
    session_start();
    require 'db_connection.php';

    if (isset($_POST['update_product'])) {
        $product_id = mysqli_real_escape_string($db_connection, $_POST['product_id']);
        $title = mysqli_real_escape_string($db_connection, $_POST['title']);
        $description = mysqli_real_escape_string($db_connection, $_POST['description']);
        $price = mysqli_real_escape_string($db_connection, $_POST['price']);
        $availability = mysqli_real_escape_string($db_connection, $_POST['available']);

        $query = "UPDATE SET products title='$title', description='$description', price='$price', 
                    available='$availability' WHERE product_id='$product_id'";

        if (mysqli_query($db_connection, $query)) {
            $_SESSION['message'] = "Product details updated!";
            header("Location: ../product_edit.php");
            exit(0);
        }   else {
                $_SESSION['message'] = "Product details not updated!";
                header("Location: ../product_edit.php");
                exit(0);
        }
    }
?>