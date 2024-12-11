<?php

function getList() {
    global $conn;
    $stmt = $conn->query('SELECT id, title, description FROM exam_lists');
    return $stmt->fetchAll();
}
function getTasks() {
    global $conn;
    $stmt = $conn->query('SELECT id, title, is_completed, list_id FROM exam_tasks');
    return $stmt->fetchAll();
}

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

function getTaskList($listid) {
    global $conn;
    $stmt = $conn->query('SELECT id, title, is_completed, list_id FROM exam_tasks WHERE list_id = '. $listid);

    return $stmt->fetchAll();
}

function getListTitle($listid) {
    global $conn;
    $stmt = $conn->query('SELECT id, title FROM exam_lists WHERE id =' .$listid);

    return $stmt->fetch();
}
?>