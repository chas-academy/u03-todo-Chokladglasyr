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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display+SC:ital,wght@0,400;0,700;0,900;1,400;1,700;1,900&family=Playfair:ital,opsz,wght@0,5..1200,300..900;1,5..1200,300..900&display=swap" rel="stylesheet">
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

        <?php
        if (!$tasks) { ?>

            <p class="message">You have no tasks in this list!</p>

        <?php } else {
        foreach ($tasks as $task): ?>
        <div>
            <p><?php echo $task['title']; ?></p>
            <input type="checkbox" name="is_completed" <?php if($task['is_completed']) { echo 'checked';} ?>>
            <form action="" method="post">
            <input type="hidden" name="id" value="<?=$task['id']?>">
            <button type="submit" name="crud" value="deleteTask">X</button>
        </form>
        </div>
        <?php  endforeach; 
        } 
    } ?>   
   
    </section>    
    <div class="addTask">
        <form action="" method="POST">
            <input type="hidden" name="list_id" value="<?= $listTitle['id']; ?>">
            <?php var_dump($listTitle['id']);?>
            <input type="text" name="title" placeholder="Task:">
            <button type="submit" name="crud" value="addTask">Add <span>&#43;</span></button>
        </form>
    </div> 
    <?php require_once 'footer.php';?>
</body>
</html>