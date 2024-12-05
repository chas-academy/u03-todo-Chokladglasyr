<?php
require_once 'db.php';
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
    <div>
       <?php
    //    if(isset($_GET['show_btn'])) {
    //     $currentList = 
    //     var_dump($currentList);
    //    }
        $tasks = getTasks($conn);

        foreach ($tasks as $task): ?>
        <div>
            <?php if(htmlspecialchars($task['list_id']) != "1"): ?>
          <p><?php echo htmlspecialchars($task['title']);?></p>  
            <form action="">
                <?php if(htmlspecialchars($task['is_completed']) == "1"): ?>
                <input type="checkbox" name="is_completed" checked>
                <?php else: ?>
                    <input type="checkbox" name="is_completed">
                <?php endif; ?>
            </form>
          <?php endif; ?>
        </div>
        
        <?php endforeach; ?>
    </div>
    
</body>
</html>