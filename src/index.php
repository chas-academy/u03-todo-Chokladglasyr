<?php
session_start();

// Set a refresh for new predefined list, it doesnt automatically show up, needs a reload.
if (isset($_POST['new_list']) && ($_POST['new_list'] != 7)) {
    header("refresh: 2;");
    }



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playball&family=Playfair+Display+SC:ital,wght@0,400;0,700;0,900;1,400;1,700;1,900&family=Playfair:ital,opsz,wght@0,5..1200,300..900;1,5..1200,300..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/login.css">
</head>
<?php
    // IF session variable is set with a user show the users lists by going to lists.php
    if (isset($_SESSION['user'])) {

        require 'lists.php';

    } else {

    ?>
<body class="login">
<!-- IF session variable is null show login -->
<div class="login_card">  
    <h1 class="appheader">Xmas List</h1>
    <br>
    <form action="auth.php" method="post">
        <!-- Input for username -->
        <input type="text" name="username" placeholder="username" required>
        <br>
        <!-- Input for user password -->
        <input type="password" name="password" placeholder="password">
        <br>
        <!-- Button to login -->
        <button class="loginBTN" type="submit" name="auth" value="login">Log in</button>
    </form>
    
    <!-- Set form to go to signup for new users -->
    <form action="register.php" method="GET">
        <!-- Print message for new users -->
        <p>New here? Go to sign up now!</p>
        <!-- Button to go to signup if use is new -->
        <button class="registerBTN" type="submit" name="register" value="true">Sign up</button>
    </form>

</div>
<?php } ?>

</body>
</html>


