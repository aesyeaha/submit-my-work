<?php
// Include config file
include 'config.php';

// Get the user's input from the login form
$username = $_POST['username'];
$password = $_POST['password'];

// Query the users table to validate the user's credentials
$sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
$result = mysqli_query($conn, $sql);

// If the query returns a result, the user's credentials are valid
if (mysqli_num_rows($result) > 0) {
    // Redirect to data.php
    header('Location: data.php');
    exit();
} else {
    // If the query returns no results, the user's credentials are invalid
    echo "Invalid username or password";
}

// Close the database connection
mysqli_close($conn);
?>