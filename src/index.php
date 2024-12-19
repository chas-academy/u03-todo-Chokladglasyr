<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playball&family=Playfair+Display+SC:ital,wght@0,400;0,700;0,900;1,400;1,700;1,900&family=Playfair:ital,opsz,wght@0,5..1200,300..900;1,5..1200,300..900&display=swap" rel="stylesheet">    <link rel="stylesheet" href="./css/main.css">
</head>
<?php
    if (isset($_SESSION['user'])) {

        require 'lists.php';
    } else {
    ?>
<body class="login">

<div class="login_card">  
    <h1 class="appheader">Xmas List</h1>
    <br>
    <form action="auth.php" method="post">
        <input type="text" name="username" placeholder="username" required>
        <br>
        <input type="password" name="password" placeholder="password">
        <br>
        <button class="loginBTN" type="submit" name="auth" value="login">Log in</button>
    </form>

    <form action="register.php" method="GET">
        <p>New here? Go to sign up now!</p>
        <button class="registerBTN" type="submit" name="register" value="true">Sign up</button>
    </form>

</div>
<?php }
?>



</body>
</html>


