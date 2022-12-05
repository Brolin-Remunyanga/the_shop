<?php


    $servername = 'localhost';
    $username = 'brolinr';
    $password = '2003';
    $dbname = 'onlineShop';
    
    // Create connection
    $conn = new mysqli("$servername", "$username", "$password", "$dbname");
     
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    } else {
        //Fetching informattion from form
        $first_name = $_POST['firstName'];
        $last_name = $_POST['lastName'];
        $username = $_POST['username'];
        $password =  $_POST['password'];
        $password_confirmation = $_POST['passwordConfirmation'];
        
        if ($password === $password_confirmation) {
            $fetch_user = "SELECT username FROM users WHERE username='$username'";
            $query_result =  $conn->query($fetch_user);
            
            if ($query_result->num_rows >= 1) {
                echo "Username is taken. Please enter a different username.";
            } else {
                $register_user = "INSERT INTO users (first_name, last_name, username, password) 
                                  VALUES ('$first_name', '$last_name', '$username', '$password')";

                if ($conn->query($fetch_user) === TRUE) {
                    header('location: ../../index.html');
                    echo "Sign up successful";
                } else {
                    echo "Error: " . $fetch_user . "<br>" . $conn->error;
                }
                $conn->close();
            }
        } else {
            header('location: ./register.php');
        }
    }

?>