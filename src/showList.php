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
      
        $tasks = getTasksPerList($_GET['listid']);
        
        $listTitle = getListOne($_GET['listid']); ?>

        <h2><?=$listTitle['title'];?></h2>
        
        <a href="edit.php?id=<?= $listTitle['id']; ?>&crud=editList">Edit</a>
        <!-- <div class="createCustom">

        <form action="edit.php" method="get">
        <input type="hidden" name="id" value="<?=$listTitle['id']?>">
        <button type="submit" name="crud" value="editList">Edit list</button> 
        <br><br>
        </form>

        </div> -->
        <?php
        if (!$tasks) { ?>

            <p class="message">You have no tasks in this list!</p>

        <?php } else {
        foreach ($tasks as $task): ?>
        <div>
            <p><?php echo $task['title']; ?></p>
            <input type="checkbox" name="is_completed" <?php if($task['is_completed']) { echo 'checked';} ?>>
            <!-- <a href="showList.php?id=<?=$task['id']?>&crud=deleteTask">delete</a> -->
             <form action="" method="post">
             <input type="hidden" name="id" value="<?=$task['id']?>">
             <button type="submit" name="crud" value="deleteTask">X</button>
        </form>
        </div>
        <?php  endforeach; 
        } 
    } 
?>
                
    </section>
</body>
</html>