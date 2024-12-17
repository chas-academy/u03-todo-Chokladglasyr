
<html>
    <br>
    <?php
    
    if (isset($_GET['listID'])) {
        $list = getListOne($_GET['listID']);
        var_dump($list);
    }?>

    <form class="editList" action="oneList.php?listID=<?= $listTitle['listID'];?>" method="POST">
        <input type="text" name="title" placeholder="Title" value="<?=$list['title']?>">
        <input type="text" name="description" placeholder="Description:" value="<?=$list['description'] ?>">
        <input type="hidden" name="id" value="<?=$list['listID']?>">
        <button type="submit" name="crud" value="editList">Edit</button>
    </form>

</html>