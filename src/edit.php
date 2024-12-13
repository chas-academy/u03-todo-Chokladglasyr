<?php
require_once 'db.php';
dbConnect();
require 'crud_functions.php';
?>

<html>
    <br>
    <?php
    
    if (isset($_GET['id'])) {
        $list = getListOne($_GET['id']);
        var_dump($list);
    }?>

    <form class="editList" action="edit.php?id=<?=$list['id']?>&crud=editList" method="POST">
        <input type="text" name="title" placeholder="Title" value="<?=$list['title']?>">
        <input type="text" name="description" placeholder="Description:" value="<?=$list['description'] ?>">
        <input type="hidden" name="id" value="<?=$list['id']?>">
        <button type="submit" name="crud" value="editList">Edit</button>
    </form>

</html>