 <?php
$servername = "localhost";
$username = "root";
$password = "mysql";
$database = "reallives";

//create connection
$conn = mysqli_connect($servername, $username, $password,$database);

// Checking connection
if (!$conn) {
    die("Connection failed: " .mysqli_connect_error());
}
else {
}


