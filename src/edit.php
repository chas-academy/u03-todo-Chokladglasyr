<?php
require_once 'db.php';
dbConnect();
require 'crud_functions.php';
?>

<html>
    <br>
    <?php
    if(isset($_GET['listid'])) { 
      
        $list = getListOne($_GET['listid']);

    } ?>

    <form class="editList" action="index.php" method="POST">
        <input type="text" name="title" placeholder="Title" value="<?= $list['title']?>">
        <input type="text" name="description" placeholder="Description:" value="<?=$list['description'] ?>">
        <button type="submit" name="crud" value="editList">Edit</button>
    </form>

</html>