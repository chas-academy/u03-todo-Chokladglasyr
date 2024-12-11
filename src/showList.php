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
    <section class="list">
  

    <?php
    if(isset($_GET['listid'])) { 
      
        $tasks = getTaskList($_GET['listid']);
        
        $listTitle = getListTitle($_GET['listid']); ?>

        <h2><?=$listTitle['title'];?></h2>
        <a href="edit.php?listid=<?= $listTitle['id']; ?>"></a>

        <?php
        if (!$tasks) { ?>

            <p class="message">You have no tasks in this list!</p>

        <?php } else {
        foreach ($tasks as $task): ?>
        <div>
            <p><?php echo $task['title']; ?></p>
            <input type="checkbox" name="is_completed" <?php if($task['is_completed']) { echo 'checked';} ?>>
        
  
        </div>
        <?php  endforeach; 
        } 
    } ?>            
        


       
        </section>
 
</body>
</html>