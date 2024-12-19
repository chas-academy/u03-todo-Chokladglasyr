<?php

require_once 'db.php';
dbConnect();
require_once 'crud_functions.php';

$users = getAllUsers();
$lists = getAllListsfromAllUsers();

?>
<html>
    <div class="admin">
<h3>Admin</h3>
<form action="index.php" method="get">
<select name="show">
    <option value="">Show all</option>
    <option value="users">users</option>
    <option value="lists">lists</option>
</select>
<button type="submit">Go</button>
</form>
<?php 

if (isset($_GET['show'])) {
    if ($_GET['show'] == 'users') {
        foreach ($users as $user){
            if ($user['username'] != 'admin') {
                if ($user['userID'] != $_SESSION['user']['userID']){ ?>

                <p><?=$user['username']?></p>

                <form action="index.php" method="POST">
                    <input type="hidden" name="id" value ="<?=$user['userID']?>">
                    <?php
                    if($user['role'] == 'admin'){?>

                    <button type="submit" name="admin" value="remove">remove admin role</button>

                    <?php } else {?>

                    <button type="submit" name="admin" value="assign">assign admin role</button>

                    <?php } } } ?>
                </form>
            <?php } 
    } else if ($_GET['show'] == 'lists') {
        foreach ($lists as $list) {
            if ($list['username'] != $_SESSION['user']['username']) { ?>

                <p><?=$list['title']?></p>
                <p><?=$list['username']?></p>

            <?php }
            }
        }
        
    }
?>
</div>
</html>