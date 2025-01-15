<?php
require_once 'db.php';
dbConnect();
require 'crud_functions.php';?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xmas List</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playball&family=Playfair+Display+SC:ital,wght@0,400;0,700;0,900;1,400;1,700;1,900&family=Playfair:ital,opsz,wght@0,5..1200,300..900;1,5..1200,300..900&display=swap" rel="stylesheet">    
    <link rel="stylesheet" href="./css/oneList.css">
</head>
<body>
    <div class="oneList">
        <section>
            <div class="task_container">
                <?php
                // Get one list by checking list ID
                if (isset($_GET['listID'])) :
                    // get all checked task and all unchecked tasks from DB
                    $checkedTasks = getTasksAndchecked($_GET['listID']);
                    $uncheckedTasks = getTasksAndunchecked($_GET['listID']);

                    // get data for one list from DB
                    $listTitle = getListOne($_GET['listID']);?>
                    <!-- Print out title and description from the listdata for the one list from dB -->
                    <h2><?=$listTitle['title'];?></h2>
                    <h4><?=$listTitle['description'];?></h4>
                    
                    <!-- Print out a link button to edit title and descript for list -->
                    <a href="oneList.php?listID=<?= $listTitle['listID'];?>&crud=editList"><img src="./css/assets/editBTN.png"></a>
                    <?php
                    // IF user clicked on button show edit.php
                    if (isset($_GET['crud']) && $_GET['crud'] == 'editList') {
                        require 'edit.php';
                    }?>

                    <?php
                    // IF no tasks found in dB print out message that list is empty
                    if (!$checkedTasks && !$uncheckedTasks) {?>
                        <p class="message">You have no tasks in this list!</p>
                        <?php
                    } else {?>
                    <!-- Print out list of unchecked tasks from dB -->
                    <div class="todo">
                        <h3>To do</h3>
                        <?php
                        // IF unchecked is empty print out message that all is completed
                        if (!$uncheckedTasks) { ?>
                            <p class="message">You have completed all your tasks!</p>
                            <?php
                        }

                        foreach ($uncheckedTasks as $uncheckedTask) :?>
                            <!-- Print out all unchecked tasks avaiable -->
                            <div class="tasks">
                                <a href="oneList.php?listID=<?= $listTitle['listID'];?>&crud=editTask&taskID=<?=$uncheckedTask['taskID']?>"><?= $uncheckedTask['title']?></a>

                                <form action="" method="post">
                                    <!-- Give hidden ID to specific task -->
                                    <input type="hidden" name="id" value="<?=$uncheckedTask['taskID']?>">
                                    <!-- Button to check task as done -->
                                    <button class="BTN" type="submit" name="is_completed" value=0>Done</button>
                                    <!-- Button to delete task -->
                                    <button class="BTNdelete" type="submit" name="crud" value="deleteTask">X</button>
                                </form>
                            </div>
                            <?php
                        endforeach;?>
                            <?php
                            if (isset($_GET['crud']) && $_GET['crud'] == 'editTask') {
                                require 'editTask.php';
                            }
                            ?>
                    </div>
                    <!-- Print out all checked tasks -->
                    <div class="completed">
                        <h3>Completed</h3>
                        <?php
                        // IF there is no checked tasks print out that user has no completed tasks
                        if (!$checkedTasks) { ?>
                            <p class="message">You have no completed tasks!</p>
                            <?php
                        }

                        foreach ($checkedTasks as $checkedTask) :?>
                            <div class="tasks">
                                <p><?=$checkedTask['title']?></p>

                                <form action="" method="post">
                                    <!-- give ID to specific task -->
                                    <input type="hidden" name="id" value="<?=$checkedTask['taskID']?>">
                                    <!-- Button to regret task being done -->
                                    <button class="BTN" type="submit" name="is_completed" value=1>Regret</button>
                                    <!-- Button to delete task -->
                                    <button class="BTNdelete" type="submit" name="crud" value="deleteTask">X</button>
                                </form>
                            </div>
                            <?php
                        endforeach;?>  
                    </div>
                        <?php
                    }?>
                <!-- Form to add more tasks -->
                <div class="addTask">
                    <form action="" method="POST">
                        <!-- Give listID to task to give destination for task input in dB -->
                        <input type="hidden" name="listID" value="<?= $listTitle['listID']; ?>">
                        <!-- Input for user to write task title -->
                        <input type="text" name="title" placeholder="Task:" required>
                        <!-- Button to add task -->
                        <button class="BTNadd" type="submit" name="crud" value="addTask">Add <span>&#43;</span></button>
                    </form>
                </div>
                    <?php
                endif;?>
            </div>
        </section>
    <div>
        <!-- Add footer for back and logout buttons -->
        <?php
        require_once 'footer.php';?>
    </div>
    </div>
</body>
</html>
