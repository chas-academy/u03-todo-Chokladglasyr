<?php

//Hämtar alla listor (per user i framtiden)
function getListAll($userID) {
    global $conn;
    $stmt = $conn->query('SELECT listID, title, description FROM lists WHERE userID =' .$userID);
    return $stmt->fetchAll();
}
//hämtar en lista
function getListOne($listID) {
    global $conn;
    $stmt = $conn->query('SELECT listID, title, description FROM lists WHERE listID =' .$listID);

    return $stmt->fetch();
}

//Lägg till ny lista
function addList($listData) {
    global $conn;
    $stmt = $conn->prepare("INSERT INTO lists(title, description, userID) VALUES (:title, :description, :userID)");
    $stmt->bindParam(':title', $listData['title']);
    $stmt->bindParam(':description', $listData['description']);
    $stmt->bindParam(':userID', $listData['userID']);

    $stmt->execute();

    // header("Location: http://localhost");

}
//ändra list titel och descript
function editList($listData){
   
    global $conn;
    $stmt = $conn->prepare("UPDATE lists SET title = :title, description = :description WHERE listID = :listID");
    $stmt->bindParam(':title', $listData['title']);
    $stmt->bindParam(':description', $listData['description']);
    $stmt->bindParam(':listID', $listData['listID']);

    $stmt->execute();
// header("Location: http://localhost/");
}
//
function deleteList($listID){

    global $conn;
    $stmt = $conn->exec("DELETE FROM lists WHERE listID =" .$listID);

}

//if sats för om det ska vara lägga till/ ändra eller deleta en lista
if (isset($_POST['crud']) && $_POST['crud'] == "addList") {

    addList(['title' => $_POST['title'], 'description' => $_POST['description'], 'userID' => $_POST['userID']]);

} else if (isset($_POST['crud']) && $_POST['crud'] == "editList") {

    editList(['listID' => $_POST['id'],'title' => $_POST['title'], 'description' => $_POST['description']]);

} else if  (isset($_POST['crud']) && $_POST['crud'] == "deleteList") {

    deleteList($_POST['id']);

} else if (isset($_POST['crud']) && $_POST['crud'] == "back"){

    header("Location: http://localhost/index.php");
}

//Hämtar alla uppgifter per lista
function getTasksPerList($listID) {
    global $conn;
    $stmt = $conn->query('SELECT taskID, title, is_completed, listID FROM tasks WHERE listID = '. $listID);

    return $stmt->fetchAll();
}
function getTasksAndchecked($listID){
    global $conn;
    $stmt = $conn->query('SELECT taskID, title, listID FROM tasks WHERE is_completed = 1 AND listID =' .$listID);
    
    return $stmt->fetchAll();
}
function getTasksAndunchecked($listID) {
    global $conn;
    $stmt = $conn->query('SELECT taskID, title, listID FROM tasks WHERE is_completed = 0 AND listID =' .$listID);
    
    return $stmt->fetchAll();
}
//hämtar en task från en lista
function getTaskOne($taskID) {

    global $conn;
    $stmt = $conn->query('SELECT * FROM tasks WHERE taskID =' .$taskID);
 
    return $stmt->fetch();
}
//lägga till task
function addTask($taskData) {
    global $conn;
    $stmt = $conn->prepare("INSERT INTO tasks(listID, title) VALUES (:listID, :title)");
    $stmt->bindParam(':listID', $taskData['listID']);
    $stmt->bindParam(':title', $taskData['title']);

    $stmt->execute();

}
//ta bort vald task
function deleteTask($taskID) {
    global $conn;
    $stmt = $conn->exec("DELETE FROM tasks WHERE taskID =" .$taskID);
}
if  (isset($_POST['crud'])) {
    if ($_POST['crud'] == "deleteTask") {

        deleteTask($_POST['id']);

    } else if ($_POST['crud'] == "addTask") {

        addTask(['listID' => $_POST['listID'], 'title' => $_POST['title']]);

    }
}
//done eller icke done task
//sätter en icke done till done
function completedTask($taskID) {
    global $conn;
    $stmt = $conn->exec('UPDATE tasks SET is_completed = 1 WHERE taskID =' .$taskID);

}
//sätter en done till icke done
function incompletedTask($taskID) {
    global $conn;
    $stmt = $conn->exec('UPDATE tasks SET is_completed = 0 WHERE taskID =' .$taskID);
}
if (isset($_POST['is_completed'])) {
    if($_POST['is_completed'] == 0) {
        completedTask($_POST['id']);       
    } else if ($_POST['is_completed'] == 1) {
        incompletedTask($_POST['id']);
    }

}
//admin functions
function getAllUsers() {
    global $conn;
    $stmt = $conn->query('SELECT username, role, userID FROM users');

    return $stmt->fetchAll();
}
function getAllListsfromAllUsers() {
    global $conn;
    $stmt = $conn->query('SELECT lists.title, users.username FROM lists INNER JOIN users ON lists.userID = users.userID');

    return $stmt->fetchAll();
}
function assignAdmin($userID) {
    global $conn;
    $stmt = $conn->exec('UPDATE users SET role = "admin" WHERE userID =' .$userID);
}
function removeAdmin($userID) {
    global $conn;
    $stmt = $conn->exec('UPDATE users SET role = null WHERE userID =' .$userID);
}
if (isset($_POST['admin'])) {
    if ($_POST['admin'] == 'remove') {
        removeAdmin($_POST['id']);
    } else if ($_POST['admin'] == 'assign') {
        assignAdmin($_POST['id']);
    }
}
?>