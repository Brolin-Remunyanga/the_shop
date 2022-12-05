<?php
    //********************************************************************
    //This code is for handling the POST request for loging in users
    //********************************************************************

    session_start();
    //Connecting with the database
    $connection = mysqli_connection('localhost', 'brolinr', '2003', 'onlineShop');
    mysqli_select_db($connection, 'users');

    //Fetching informattion from form
    $username = $_POST['username'];
    $password = $_POST['password'];

    //VAlidating user information
    $fetch_user = "SELECT * FROM users WHERE username='$username' && password='$password'";
    $query_result = mysqli_query($connection, $fetch_user);

    if (mysqli_num_rows($query_result) == 1) {
        header('location:dashboard.php');
    } else {
        header('location:login.php');
    }
?>