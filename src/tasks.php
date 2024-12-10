<?php
require_once 'db.php';
dbConnect();
require 'crud_functions.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List</title>
        <link rel="stylesheet" href="main.css">
</head>
<body>
    <?php
    if(isset($_GET['listid'])) {
        $listid = $_GET['listid'];
    }
        
        function getTaskList($listid) {
           $stmt = $listid->query('SELECT id, title, is_completed FROM exam_tasks WHERE list_id= $listid'); 
           
           return $stmt->fetchAll();
        }

        $list = getTaskList($conn);

        foreach ($list as $task): ?>

        <p><?php echo htmlspecialchars($task['title']); ?></p>
        <input type="checkbox" name="is_completed" <?php if('is_completed') { echo 'checked';} ?>>
        
        <?php endforeach; ?>
        

   
</body>
</html>