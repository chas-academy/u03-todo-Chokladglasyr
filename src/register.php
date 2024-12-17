<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="main.css">
</head>
<body class="login">
    <div class="login_card">
    <?php
        if (isset($_GET['register'])) {?>
        <h1 class="appheader">Xmas List</h1>
        <br>
            <form action="auth.php" method="post">
                <input type="text" name="name" placeholder="Name">
                <br>
                <input type="email" name="email" placeholder="email@example.com">
                <br>
                <input type="password" name="password" placeholder="password">
                <br>
                <button class="registerBTN" type="submit" name="auth" value="register">Sign up</button>
            </form>
    <?php
    }
    ?>         
    </div>

</body>
</html>
