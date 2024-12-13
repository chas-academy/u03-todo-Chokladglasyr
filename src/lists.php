<?php

require_once 'db.php';
dbConnect();
require 'crud_functions.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xmas List</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
   <section>
    <h2>Lists</h2>
    <div class = "list">    
        
        <?php 
       
        $lists = getListAll();
        if (!$lists) { ?>

        <p class="message">You have no lists at the moment!</p>
          
        <?php } else
        foreach ($lists as $list): ?>

         <div>      

            <p><?=$list['title'];?></p>
            <p><?=$list['description'];?></p>
            <?php $listID = ($list['id']); ?>
        
          <a href="showList.php?listid=<?= $listID; ?>">show list</a>
          <a href="lists.php?id=<?=$listID?>&crud=deleteList">delete</a>


        </div>
  
        <?php endforeach; ?></div>
        <?php 
          if(isset($_GET['crud']) && $_GET['crud'] == 'deleteList') {
            
            require 'delete.php';
          }
          ?>

        
   </section> 
   <div class="createCustom">

          <form action="lists.php" method="get">
            <button type="submit" name="crud" value="addList">New list</button> 
            <br><br>
          </form>

          <?php 
          if(isset($_GET['crud']) && $_GET['crud'] == 'addList') {
            
              require 'add.php';
          }
          ?>
    </div>
</body>
</html>