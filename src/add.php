<html>
    <br>
    <?php
    
    if (isset($_GET['userID'])) {
        $userID = $_GET['userID'];
    }?>

    <form class="newList" action="index.php" method="POST">
        <input type="hidden" name="userID" value="<?=intval($userID)?>">
        <input type="text" name="title" placeholder="Title:" required>
        <input type="text" name="description" placeholder="Description:">
        <button type="submit" name="crud" value="addList">Add <span>&#43;</span></button>
    </form>

    
</html>