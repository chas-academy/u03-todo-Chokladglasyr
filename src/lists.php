<?php

require_once 'db.php';
dbConnect();
require_once 'crud_functions.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Xmas List</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Playball&family=Playfair+Display+SC:ital,wght@0,400;0,700;0,900;1,400;1,700;1,900&family=Playfair:ital,opsz,wght@0,5..1200,300..900;1,5..1200,300..900&display=swap" rel="stylesheet">    <link rel="stylesheet" href="./css/main.css">
</head>
<body>
  <div class="list_page">
  <h2>Welcome back <?=$_SESSION['user']['username']?></h2>
  <?php if (($_SESSION['user']['role']) == 'admin') { 
            require 'admin.php';
        } ?>
   <section>
    <h2>My lists</h2>
    <div class = "list">    
        
        <?php 
        $userID = ($_SESSION['user']['userID']);
        
        $lists = getListAll($userID);
        if (!$lists) { ?>

        <p class="message">You have no lists at the moment!</p>
          
        <?php } else
        foreach ($lists as $list): ?>

         <div class="list_card" >
          <div><?php $listID = ($list['listID']); ?>  
           <a class="title" href="oneList.php?listID=<?= $listID; ?>"><?=$list['title'];?></a>
            <p class="descript"><?=$list['description'];?></p>
            </div>   
          <div class="list_options">
            
            <a href="index.php?listID=<?=$listID?>&crud=deleteList">X</a>
          </div>

        </div>
  
        <?php endforeach; ?></div>
        <?php 
          if(isset($_GET['crud']) && $_GET['crud'] == 'deleteList') {
            
            require 'delete.php';
          }
          ?>

        
   </section> 
   <div class="createCustom">

          <!-- <form action="index.php" method="get">
            <button type="submit" name="crud" value="addList">New list</button> 
            <br><br>
          </form> -->
          <a href="http://localhost/index.php?userID=<?=($_SESSION['user']['userID'])?>&crud=addList">New</a>

          <?php 
          if(isset($_GET['crud']) && $_GET['crud'] == 'addList') {
            
              require 'add.php';
          }
          ?>
    </div>
   <?php require_once 'footer.php';?>
   </div>
</body>
</html>