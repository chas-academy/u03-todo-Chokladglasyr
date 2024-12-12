<?php
//Hämtar alla listor (per user i framtiden)
function getListAll() {
    global $conn;
    $stmt = $conn->query('SELECT id, title, description FROM exam_lists');
    return $stmt->fetchAll();
}
//Hämtar alla uppgifter per lista
function getTasksPerList($listid) {
    global $conn;
    $stmt = $conn->query('SELECT id, title, is_completed, list_id FROM exam_tasks WHERE list_id = '. $listid);

    return $stmt->fetchAll();
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
if (isset($_POST['crud']) && $_POST['crud'] == "add") {
    addList(['title' => $_POST['title'], 'description' => $_POST['description']]);
}

//
function getListOne($listid) {
    global $conn;
    $stmt = $conn->query('SELECT id, title, description FROM exam_lists WHERE id =' .$listid);

    return $stmt->fetch();
}
//ändra list titel och descript
function editList($listData){
    global$conn;
    $stmt = $conn->prepare("UPDATE exam_lists SET title = :title, description = :description WHERE id = :listid");
    $stmt->bindParam(':title', $listData['title']);
    $stmt->bindParam(':description', $listData['description']);
    $stmt->bindParam(':listid', $listData['id']);

    $stmt->execute();
}
if (isset($_POST['crud']) && $_POST['crud'] == "editList") {
    editList(['title' => $_POST['title'], 'description' => $_POST['description']]);
}

?>