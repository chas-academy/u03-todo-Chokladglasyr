<?php
session_start();
require_once "db.php";
require_once "crud_functions.php";
dbConnect();


// Function to log in user, check password and username to dB
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

// Function to register new user, insert into table for users new password and username
function register($username, $password) {

    global $conn;

    // function checkIfUsernameExists($username) {
    //     global $conn;

    //     $stmt = $conn->prepare("SELECT userID FROM users WHERE username = :username LIMIT 1");
    //     $stmt->bindParam(':username', $username);
        
    //     $stmt->execute();

    //     return $stmt->fetch();
    // }
    
    // $userID = checkIfUsernameExists($username);
    // if (empty($userID)) {

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $query = $conn->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
    
        $query->bindParam(':username', $username);
        $query->bindParam(':password', $hashedPassword);
    
        $query->execute();
    
        header("Location: http://localhost/index.php?login=true");
    // } 

}

if (isset($_POST['auth']) && $_POST['auth'] == 'login') {
    $username = sanitizeInput($_POST['username']);
    $password = sanitizeInput($_POST['password']);
    login($username, $password);

} else if (isset($_POST['auth']) && $_POST['auth'] == 'register') {
    $username = sanitizeInput($_POST['username']);
    $password = sanitizeInput($_POST['password']);
    register($username, $password);

} else {
    header("Location: http://localhost/index.php");
}
?>