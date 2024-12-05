<?php

function getList($conn) {
    $stmt = $conn->query('SELECT id, title, description FROM exam_lists');
    return $stmt->fetchAll();
}
function getTasks($conn) {
    $stmt = $conn->query('SELECT id, title, is_completed, list_id FROM exam_tasks');
    return $stmt->fetchAll();
}

?>