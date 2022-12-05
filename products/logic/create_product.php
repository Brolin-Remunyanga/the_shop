<?php
    session_start();
    require 'db_connection.php';

    if (isset($_POST['save_product'])) {
        $title = mysqli_real_escape_string($db_connection, $_POST['title']);
        $description = mysqli_real_escape_string($db_connection, $_POST['description']);
        $price = mysqli_real_escape_string($db_connection, $_POST['price']);
        $availability = mysqli_real_escape_string($db_connection, $_POST['available']);

        $query = "INSERT INTO 'products' (`title`, `description`, `price`, `available`) VALUES 
                ('$title', '$description', '$price', '$availability')";
          
        if (mysqli_query($db_connection, $query)) {
            $_SESSION['message'] = "Product created!";
            header("Location: ../product_index.php");
            exit(0);
        } else {
            $_SESSION['message'] = "Product not created!";
            header("Location: ../product_index.php");
            exit(0);
        }
    }

?>