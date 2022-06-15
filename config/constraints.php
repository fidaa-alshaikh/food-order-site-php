<?php 
// Start session
session_start();

define('SITE_URL', 'http://localhost/food-order-wibsite/');
//make connection
define('LOCALHOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'food-order');

$conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error($conn)); // database connection
$db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error($conn));

function debug_to_console($data) {
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}

?>