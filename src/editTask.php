<?php
if(isset($_GET['taskID'])){
    $task = getTaskOne($_GET['taskID']);
}
?>
<div class="editList">
    <form class="editTask" action="oneList.php?listID=<?= $listTitle['listID'];?>" method="POST">
    <h2>Edit</h2>
        <div>
            <!-- Input for title, set placeholder value as title from dB -->
            <label>Task</label>
            <input type="text" name="title" placeholder="Title" value="<?=$task['title']?>">
            <!-- Give ID to list so function knows where to update -->
            <input type="hidden" name="id" value="<?=$task['taskID']?>">
        </div>
        <!-- Button to edit changes -->
        <div>
            <button class="BTNedit" type="submit" name="crud" value="editTask">Edit</button>
            <!-- Button to cancel -->
            <button class="BTNcancel" type="submit">Cancel</button>
        </div>
    </form>
</div>