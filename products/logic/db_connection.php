<?php
    //BUILD DB CONNECTION
    $db_connection = mysqli_connect('localhost', 'brolinr', '2003', 'onlineShop');
    if (!$db_connection) {
        die("Connection Failed. Please try again!". mysqli_connect_error());
    }
?>