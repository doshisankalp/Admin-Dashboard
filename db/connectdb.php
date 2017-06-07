 <?php
$servername = "localhost";
$username = "root";
$password = "mysql";
$database = "employees";

//create conntion
$conn = mysqli_connect($servername, $username, $password,$database);

// Checking conntion
if (!$conn) {
    die("Connection failed: " .mysqli_connect_error());
}
else {
    echo "Connection Successfull!!!";
}
?> 

