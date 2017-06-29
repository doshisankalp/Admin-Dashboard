<?php
session_start();
session_unset();
include("./php/login.php");
?>

<head>
    <title>Login - Neeti Solutions</title>
</head>

<body>
<div class="container">

    <header> <?php include("./header.php"); ?> </header>

    <article>
        <style>


            html {

                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;
            }


            /* Full-width input fields */
            input[type=password], input[type=email] {
                width: 100%;
                padding: 12px 20px;
                margin: 8px 0;
                display: inline-block;
                border: 1px solid #ccc;
                box-sizing: border-box;
            }

            /* Set a style for all buttons */
            button {
                background-color: #023A4D;
                color: white;
                padding: 14px 20px;
                margin: 8px 0;
                border: none;
                cursor: pointer;
                width: 100%;
            }

            .container {
                padding: 16px;
            }

            /* Modal Content/Box */
            .modal-content {
                background-color: #fefefe;
                margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
                border: 0px solid #888;
                width: 80%; /* Could be more or less, depending on screen size */
            }

            span.psw {
                float: right;
                padding-top: 16px;
            }
            /* Add Zoom Animation */
            .animate {
                -webkit-animation: animatezoom 0.6s;
                animation: animatezoom 0.6s
            }

            @-webkit-keyframes animatezoom {
                from {-webkit-transform: scale(0)}
                to {-webkit-transform: scale(1)}
            }

            @keyframes animatezoom {
                from {transform: scale(0)}
                to {transform: scale(1)}
            }

            }
        </style>

        <?php
        if(isset($_POST['email'])){
            $login_result=login();
            if($login_result==0)
                header("location: ./display.php");
            else{
                echo "<br> <h3>Error: Check Email and password!!!</h3>";
            }
        }
        ?>
        <br>

        <form class="modal-content animate" method="post">
            <h2>LOGIN</h2>
            <label><b>EMAIL ID</b></label>
            <input type="email" placeholder="Enter Email ID" name="email" required>

            <label><b>PASSWORD</b></label>
            <input type="password" placeholder="Enter Password" name="password" required>

            <button type="submit"><strong>LOGIN</strong></button>
        </form>


</div>

<footer> <?php include("./footer.php"); ?> </footer>

</body>

