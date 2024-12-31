
<html>
    <br>
    <div class="editList">
        <?php
        // IF use chose to edit title and description of the list
        if (isset($_GET['listID'])) {
            // Set variable with data for specific list chosen
            $list = getListOne($_GET['listID']);
            // var_dump($list);
        }?>
        
        <!-- Set destination with listID so we know where from the list we should edit -->
        <form class="editList" action="oneList.php?listID=<?= $listTitle['listID'];?>" method="POST">
        <h2>Edit</h2>
            <div>
                <!-- Input for title, set placeholder value as title from dB -->
                <input type="text" name="title" placeholder="Title" value="<?=$list['title']?>">
                <!-- Input for description, set placeholder value as descriptione from dB -->
                <input type="text" name="description" placeholder="Description:" value="<?=$list['description'] ?>">
                <!-- Give ID to list so function knows where to update -->
                <input type="hidden" name="id" value="<?=$list['listID']?>">
            </div>
            <!-- Button to edit changes -->
            <div>
                <button class="BTNedit" type="submit" name="crud" value="editList">Edit</button>
                <!-- Button to cancel -->
                <button class="BTNcancel" type="submit">Cancel</button>
            </div>
        </form>
    </div>
</html>