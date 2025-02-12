<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playball&family=Playfair+Display+SC:ital,wght@0,400;0,700;0,900;1,400;1,700;1,900&family=Playfair:ital,opsz,wght@0,5..1200,300..900;1,5..1200,300..900&display=swap" rel="stylesheet">    
    <link rel="stylesheet" href="./css/login.css">
</head>
<body class="login">
    <div class="login_card">
    <?php
        // IF user clicked on button to signup
    if (isset($_GET['register'])) :?>
        <h1 class="appheaderReg">Xmas List</h1>
        <br>
        <form action="auth.php" method="post">
            <!-- Input for new username -->
            <input type="text" name="username" placeholder="username" required>
            <br>
            <!-- Input for new password -->
            <input type="password" name="password" placeholder="password" required>
            <br>
            <!-- Button to go to auth.php to register new user -->
            <button class="registerBTN" type="submit" name="auth" value="register">Sign up</button>
        </form>
        
        <!-- Button to go back to login -->
        <form action="index.php" method="GET">
            <p>Already signed up?</p>
            <button class="loginBTN" type="submit">Log in</button>
        </form>
        <?php
    endif;?>         
    </div>
</body>
</html>S
