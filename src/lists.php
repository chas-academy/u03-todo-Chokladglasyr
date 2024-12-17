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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display+SC:ital,wght@0,400;0,700;0,900;1,400;1,700;1,900&family=Playfair:ital,opsz,wght@0,5..1200,300..900;1,5..1200,300..900&display=swap" rel="stylesheet">
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
        
          <a href="oneList.php?listid=<?= $listID; ?>">show list</a>
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
   <?php require_once 'footer.php';?>
</body>
</html>