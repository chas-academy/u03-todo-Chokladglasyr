<?php
require_once 'db.php';
dbConnect();
require_once 'crud_functions.php';

// IF user chose to delete a list
if ($_GET['crud'] == 'deleteList') :
    if (isset($_GET['listID'])) {
        // Set variable to the listID for specific list user clicked delete on
        $list = getListOne($_GET['listID']);
    }?>
    <html>
        <!-- Show message and options if user is sure to delete -->
        <section class="delete">
            <h2>Delete</h2>
            <!-- Print title of chosen list to delete -->
            <p>Do you want to delete <?=$list['title']?>?</p>
            <form action="index.php" method="POST">
                <input type="hidden" name="id" value="<?=$list['listID']?>">
                <br>
                <!-- Button to delete -->
                <button id="yes" type="submit" name="crud" value="deleteList">Yes</button>
                <!-- Button to regret decision -->
                <button type="submit" name="crud" value="back">No</button>
            </form>
        </section>
    </html>
<?php endif;
