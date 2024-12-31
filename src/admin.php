<?php

require_once 'db.php';
dbConnect();
require_once 'crud_functions.php';

$users = getAllUsers();
$lists = getAllListsfromAllUsers();

?>
<html>
    
    <div class="admin">
        <h4>Admin</h4>
        <form action="index.php" method="get">
            <select name="show">
                <option value="">Show all</option>
                <option value="users">Users</option>
                <option value="lists">Lists</option>
            </select>
            <button type="submit">Go</button>
        </form>
<?php 

if (isset($_GET['show'])) {
    if ($_GET['show'] == 'users') {
        foreach ($users as $user){
            if ($user['username'] != 'admin') {
                if ($user['userID'] != $_SESSION['user']['userID']){ ?>
                <span class="<?php if ($user['role'] == 'admin') { echo 'user_card1';} else {echo 'user_card2';}?>">
                <p><?=$user['username']?></p>

                <form action="index.php" method="POST">
                    <input type="hidden" name="id" value ="<?=$user['userID']?>">
                    <?php
                    if($user['role'] == 'admin'){?>

                    <button type="submit" name="admin" value="remove">Remove admin</button>

                    <?php } else {?>

                    <button type="submit" name="admin" value="assign">Assign admin</button>

                    <?php } } } ?>
                </form>
                </span>
            
            <?php } 
    } else if ($_GET['show'] == 'lists') {
        foreach ($lists as $list) {
            if ($list['username'] != $_SESSION['user']['username']) { ?>
            
                <span class="list_card_admin">
                    <p><?=$list['title']?></p>
                    <p><?=$list['username']?></p>
                </span>
                
            <?php }
            }
        }
        
    }
?>



</div>
</html>