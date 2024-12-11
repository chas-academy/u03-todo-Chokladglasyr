<?php
require_once 'db.php';
dbConnect();
require 'crud_functions.php';
?>

<html>
    <br>
    <?php
    if(isset($_GET['listid'])) { 
      
        $tasks = getTaskList($_GET['listid']);
        var_dump($taks);

    } ?>

    <form class="editList" action="index.php" method="POST">
        <input type="text" name="title" placeholder="Title">
        <input type="text" name="description" placeholder="Description:">
        <button type="submit" name="crud" value="editList">Edit</button>
    </form>

</html>