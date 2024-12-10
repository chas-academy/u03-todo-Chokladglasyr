<?php
session_start();
require_once "db.php";
dbConnect();

function login($email, $password) {
    $_SESSION['user'] = null;

    global $conn;

    $query = $conn->prepare("SELECT name, email, password FROM users WHERE email = :email LIMIT 1");
    $query->bindParam(':email', $email);

    $query->execute();
    
    if ($query->rowCount() > 0){
        $user = $query->fetch(PDO::FETCH_ASSOC);

        if (password_verify($password, $user['password'])) {
            $_SESSION['user'] = ['name' => $user['name'], 'email' => $user['email']];

            header("Location: http://localhost/index.php"); 

        } else {
           header("Location: http://localhost/index.php"); 
        } 

    } header("Location: http://localhost/index.php");

}

function register($name, $email, $password) {

   global $conn;

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $query = $conn->prepare("INSERT INTO users (name, email, password) VALUES (:name, :email, :password)");

    $query->bindParam(':name', $name);
    $query->bindParam(':email', $email);
    $query->bindParam(':password', $hashedPassword);

    $query->execute();

    header("Location: http://localhost/index.php?login=true");
}

if (isset($_POST['auth']) && $_POST['auth'] == 'login') {

    login($_POST['email'], $_POST['password']);

} else if (isset($_POST['auth']) && $_POST['auth'] == 'register') {

    register($_POST['name'], $_POST['email'], $_POST['password']);

} else {
    header("Location: http://localhost/index.php");
}
?>