<?php
include("connectdb.php");
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form

    $myusername = mysqli_real_escape_string($conn,$_POST['email']);
    $mypassword = mysqli_real_escape_string($conn,$_POST['password']);


    $sql = "SELECT id FROM user WHERE email = '$myusername' and password = password('$mypassword')";

    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $active = $row['active'];


    $count = mysqli_num_rows($result);

    // If result matched $myusername and $mypassword, table row must be 1 row
    mysqli_close($conn);
    if($count == 1) {

        $_SESSION['login_user'] = $myusername;
        header("location:../display.php");

    }else {

        $_SESSION['error'] = "Invalid Username Or Password Combination..." ;
        header("location:./login.php");

    }
}

?>
