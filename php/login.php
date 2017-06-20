<?php

session_start();

/**
 * @return int
 */
function login()
{   include("connectdb.php");
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // username and password sent from form

        if (!empty($conn)) {
            $myusername = mysqli_real_escape_string($conn, $_POST['email']);
            $mypassword = mysqli_real_escape_string($conn, $_POST['password']);
        }

        $sql = "SELECT user.id FROM employees.user WHERE user.email = '$myusername' and user.password = password('$mypassword')";
        $result = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($result);

        // If result matched $myusername and $mypassword, table row must be 1 row
        mysqli_close($conn);
        if ($count == 1) {

            $_SESSION['login_user'] = $myusername;
            return(0);

        } else {

            return(1);

        }
    }
    return 0;
}
