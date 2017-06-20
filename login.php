<?php

session_start();
?>
<head>
    <title>Login - Neeti Solutions</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
<div class="container">

    <header> <?php include("../header.php"); ?> </header>
    <nav>    <?php include("../side-navigation.php"); ?> </nav>

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


            /* The Modal (background) */
            .modal {
                display: none; /* Hidden by default */
                position: fixed; /* Stay in place */
                z-index: 1; /* Sit on top */
                left: 0;
                top: 0;
                width: 100%; /* Full width */
                height: 100%; /* Full height */
                overflow: auto; /* Enable scroll if needed */
                background-color: rgb(0,0,0); /* Fallback color */
                background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
                padding-top: 60px;
            }

            /* Modal Content/Box */
            .modal-content {
                background-color: #fefefe;
                margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
                border: 1px solid #888;
                width: 80%; /* Could be more or less, depending on screen size */
            }

            .close:hover,
            .close:focus {
                color: red;
                cursor: pointer;
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
        echo $_SESSION['forgot_password'];
        ?>
        <br>

        <?php
        echo $_SESSION['error'];
        ?>

        <form class="modal-content animate" action="./php/login.php" method="post">
            <h2>LOGIN</h2>
            <label><b>EMAIL ID</b></label>
            <input type="email" placeholder="Enter Email ID" name="email" required>

            <label><b>PASSWORD</b></label>
            <input type="password" placeholder="Enter Password" name="password" required>

            <button type="submit"><strong>LOGIN</strong></button>
        </form>


</div>





<footer> <?php include("../footer.php"); ?> </footer>

</body>

