<?php

//Hämtar alla listor (per user i framtiden)
function getListAll() {
    global $conn;
    $stmt = $conn->query('SELECT id, title, description FROM exam_lists');
    return $stmt->fetchAll();
}
//hämtar en lista
function getListOne($listid) {
    global $conn;
    $stmt = $conn->query('SELECT id, title, description FROM exam_lists WHERE id =' .$listid);

    return $stmt->fetch();
}

//Lägg till ny lista
function addList($listData) {
    global $conn;
    $stmt = $conn->prepare("INSERT INTO exam_lists(title, description) VALUES (:title, :description)");
    $stmt->bindParam(':title', $listData['title']);
    $stmt->bindParam(':description', $listData['description']);

    $stmt->execute();

    // header("Location: http://localhost");

}
//ändra list titel och descript
function editList($listData){
   
    global $conn;
    $stmt = $conn->prepare("UPDATE exam_lists SET title = :title, description = :description WHERE id = :listid");
    $stmt->bindParam(':title', $listData['title']);
    $stmt->bindParam(':description', $listData['description']);
    $stmt->bindParam(':listid', $listData['id']);

    $stmt->execute();
header("Location: http://localhost/");
}
//
function deleteList($listId){

    global $conn;
    $stmt = $conn->exec("DELETE FROM exam_lists WHERE id =" .$listId);

}

//if sats för om det ska vara lägga till/ ändra eller deleta en lista
if (isset($_POST['crud']) && $_POST['crud'] == "add") {

    addList(['title' => $_POST['title'], 'description' => $_POST['description']]);

} else if (isset($_POST['crud']) && $_POST['crud'] == "editList") {

    editList(['id' => $_POST['id'],'title' => $_POST['title'], 'description' => $_POST['description']]);

} else if  (isset($_POST['crud']) && $_POST['crud'] == "deleteList") {

    deleteList($_POST['id']);

} else if (isset($_POST['rud']) && $_POST['crud'] == "back"){

    header("Location: http://localhost/lists.php");
}

//Hämtar alla uppgifter per lista
function getTasksPerList($listid) {
    global $conn;
    $stmt = $conn->query('SELECT id, title, is_completed, list_id FROM exam_tasks WHERE list_id = '. $listid);

    return $stmt->fetchAll();
}
//hämtar en task från en lista
function getTaskOne($taskId) {

    global $conn;
    $stmt = $conn->query('SELECT * FROM exam_tasks WHERE id =' .$taskId);
 
    return $stmt->fetch();
}
//ta bort vald task
function deleteTask($taskId) {
    global $conn;
    $stmt = $conn->exec("DELETE FROM exam_tasks WHERE id =" .$taskId);
}
if  (isset($_POST['crud']) && $_POST['crud'] == "deleteTask") {

    deleteTask($_POST['id']);
}
?>