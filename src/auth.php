<?php
session_start();
require_once "db.php";
dbConnect();

function login($username, $password) {
    $_SESSION['user'] = null;

    global $conn;

    $query = $conn->prepare("SELECT userID, username, role, password FROM users WHERE username = :username LIMIT 1");
    $query->bindParam(':username', $username);

    $query->execute();
    
    if ($query->rowCount() > 0){
        $user = $query->fetch(PDO::FETCH_ASSOC);

        if (password_verify($password, $user['password'])) {
            $_SESSION['user'] = ['username' => $user['username'], 'userID' => $user['userID'], 'role' => $user['role']];

            header("Location: http://localhost/index.php"); 

        } else {
           header("Location: http://localhost/index.php"); 
        } 

    } header("Location: http://localhost/index.php");

}

function register($username, $password) {

   global $conn;

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $query = $conn->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");

    $query->bindParam(':username', $username);
    $query->bindParam(':password', $hashedPassword);

    $query->execute();

    header("Location: http://localhost/index.php?login=true");
}

if (isset($_POST['auth']) && $_POST['auth'] == 'login') {

    login($_POST['username'], $_POST['password']);

} else if (isset($_POST['auth']) && $_POST['auth'] == 'register') {

    register($_POST['username'], $_POST['password']);

} else {
    header("Location: http://localhost/index.php");
}
?>