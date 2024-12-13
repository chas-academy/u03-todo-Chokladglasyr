<?php
require_once 'db.php';
dbConnect();
require_once 'crud_functions.php';

if($_GET['crud'] == 'deleteList'){
    if (isset($_GET['id'])) {
        $list = getListOne($_GET['id']);
    }?>
<html>
    <section class="delete">
        <h2>Delete</h2>
            <p>Do you want to delete <?=$list['title']?>?</p>
            <form action="lists.php" method="POST">
                <input type="hidden" name="id" value="<?=$list['id']?>">
                <?php var_dump($list['id']);?>
                <button type="submit" name="crud" value="deleteList">Yes</button>
                <button type="submit" name="crud" value="back">No</button>
            </form>
    </section>
    <?php } ?>
</html>