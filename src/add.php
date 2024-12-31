<html>
    <br>
    <?php
    // IF user chose to add a list
    if (isset($_GET['userID'])) {
        // Set variable with user id to know which user to save the list to in the dB
        $userID = $_GET['userID'];
    }?>

    <form class="newList" action="index.php" method="POST">
        <!-- Give userID to new list -->
        <input type="hidden" name="userID" value="<?=intval($userID)?>">
        <!-- Input for list title -->
        <input type="text" name="title" placeholder="Title:" required>
        <!-- Input for list description -->
        <input type="text" name="description" placeholder="Description:">
        <!-- Button to add title and description to user in dB -->
        <button type="submit" name="crud" value="addList">Add <span>&#43;</span></button>
    </form>

    
</html>