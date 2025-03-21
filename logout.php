<?php
    // Start the session
    session_start();
    
    // Include your database connection file
    include("connection.php");
    
    // Ensure that the connection was successful
    if (!$conn) {
        die('Connection failed: ' . mysqli_connect_error());
    }
    
    // Perform the operation to clear the cart table
    $reset_query = "TRUNCATE TABLE cart"; // This clears all rows in the table
    
    if (mysqli_query($conn, $reset_query)) {
        // Successfully cleared the cart table
        
        // Destroy the session to log the user out
        session_destroy();
        
        // Redirect to login page
        header('Location: login.php');
        exit();
    } else {
        // Handle error
        die('Failed to reset cart: ' . mysqli_error($conn));
    }
    
    // Close the connection (good practice)
    mysqli_close($conn);
    ?>







