<?php
require_once 'db.php';
dbConnect();
require_once 'crud_functions.php';

if($_GET['crud'] == 'deleteList'){
    if (isset($_GET['listID'])) {
        $list = getListOne($_GET['listID']);
    }?>
<html>
    <section class="delete">
        <h2>Delete</h2>
            <p>Do you want to delete <?=$list['title']?>?</p>
            <form action="index.php" method="POST">
                <input type="hidden" name="id" value="<?=$list['listID']?>">
                <?php var_dump($list['listID']);?>
                <button type="submit" name="crud" value="deleteList">Yes</button>
                <button type="submit" name="crud" value="back">No</button>
            </form>
    </section>
    <?php } ?>
</html>