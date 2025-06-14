<?php
// Database configuration
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');     // Change this to your MySQL username
define('DB_PASSWORD', 'golf');         // updated password
define('DB_NAME', 'golf_app');

// Attempt to connect to MySQL database
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if($conn === false){
    die("ERROR: Could not connect to database. " . mysqli_connect_error());
}
?> 