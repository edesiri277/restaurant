<?php
// Include your database connection file
session_start();
include("connection.php");


// Perform the operation to clear the cart table
$reset_query = "TRUNCATE TABLE cart"; // This clears all rows in the table

if (mysqli_query($conn, $reset_query)) {
    // Redirect to home page after successful reset
    header('Location: home.php');
    exit();
} else {
    // Handle error
    die('Failed to reset cart: ' . mysqli_error($conn));
}

// Close the connection (good practice)
mysqli_close($conn);
?>
