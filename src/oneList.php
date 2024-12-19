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
    <link href="https://fonts.googleapis.com/css2?family=Playball&family=Playfair+Display+SC:ital,wght@0,400;0,700;0,900;1,400;1,700;1,900&family=Playfair:ital,opsz,wght@0,5..1200,300..900;1,5..1200,300..900&display=swap" rel="stylesheet">    <link rel="stylesheet" href="./css/main.css">
</head>
<body>
    <section class="list">
    <?php
    if(isset($_GET['listID'])) { 
      
        $checkedTasks = getTasksAndchecked($_GET['listID']);
        $uncheckedTasks = getTasksAndunchecked($_GET['listID']);
        
        $listTitle = getListOne($_GET['listID']);?>

        <h2><?=$listTitle['title'];?></h2>
        <h3><?=$listTitle['description'];?></h3>
        
        <a href="oneList.php?listID=<?= $listTitle['listID'];?>&crud=editList">Edit</a>
        <?php 
          if(isset($_GET['crud']) && $_GET['crud'] == 'editList') {
            
              require 'edit.php';
          }
          ?>
        <?php
        if (!$checkedTasks && !$uncheckedTasks) { ?>

            <p class="message">You have no tasks in this list!</p>

        <?php } else { ?>

        <h3>To do</h3>
        <?php
        if (!$uncheckedTasks) {?>
            <p>You have completed all your tasks!</p>
        <?php
        }
        foreach ($uncheckedTasks as $uncheckedTask): ?>
            <div>
                <p><?php echo $uncheckedTask['title']; ?></p>
                <!-- <input value="checked" type="checkbox" name="is_completed" <?php if($uncheckedTask['is_completed']) { echo 'checked';} ?>> -->
                <form action="" method="post">
                <input type="hidden" name="id" value="<?=$uncheckedTask['taskID']?>">
                <?php var_dump($uncheckedTask['taskID']);?>
                <button type="submit" name="is_completed" value=0>Done</button>
                <button type="submit" name="crud" value="deleteTask">X</button>
            </form>
            </div>
            <?php 

    
            endforeach;?>
            <h3>Completed</h3>
            <?php
            if (!$checkedTasks) {?>
                <p>You have no completed tasks!</p>
            <?php
            }
            foreach ($checkedTasks as $checkedTask): ?>
            <div>
                <p><?php echo $checkedTask['title']; ?></p>
                <!-- <input value="checked" type="checkbox" name="is_completed" <?php if($checkedTask['is_completed']) { echo 'checked';} ?>> -->
                <form action="" method="post">
                <input type="hidden" name="id" value="<?=$checkedTask['taskID']?>">
                <?php var_dump($checkedTask['taskID']);?>
                <button type="submit" name="is_completed" value=1>Regret</button>
                <button type="submit" name="crud" value="deleteTask">X</button>
            </form>
            </div>
            <?php 
            endforeach; 
        } 
    } ?>   
   
    </section>    
    <div class="addTask">
        <form action="" method="POST">
            <input type="hidden" name="listID" value="<?= $listTitle['listID']; ?>">
            <?php var_dump($listTitle['listID']);?>
            <input type="text" name="title" placeholder="Task:">
            <button type="submit" name="crud" value="addTask">Add <span>&#43;</span></button>
        </form>
    </div> 
    <?php require_once 'footer.php';?>
</body>
</html>