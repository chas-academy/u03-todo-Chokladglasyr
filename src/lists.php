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
    <link href="https://fonts.googleapis.com/css2?family=Playball&family=Playfair+Display+SC:ital,wght@0,400;0,700;0,900;1,400;1,700;1,900&family=Playfair:ital,opsz,wght@0,5..1200,300..900;1,5..1200,300..900&display=swap" rel="stylesheet">    
    <link rel="stylesheet" href="./css/main.css">
</head>
<body>
  <div class="list_page">
    <!-- Print out welcome message with username -->
    <h1>Welcome back <?=$_SESSION['user']['username']?></h1>
    
    <!-- For styling, check is role is admin and give specific classname -->
    <div class= "<?php if (($_SESSION['user']['role']) == 'admin') { echo "list_containerAdmin"; } else { echo "list_container";} ?>">
      <?php 
      // Check is user role is set to admin, if so show admin dashboard
      if (($_SESSION['user']['role']) == 'admin') { 
            require 'admin.php';
      } ?>
      <section>
      <!-- Print out all lists for user from dB -->
        <div class = "list">    
          <?php 
          // Set variable for userdata
          $userID = ($_SESSION['user']['userID']);
          
          // Set variable with array of all lists from dB
          $lists = getListAll($userID);

          // IF there are no lists in dB for user print message
          if (!$lists) { ?>

            <p class="firstMessage">You have no lists at the moment!</p>
            
            <?php } else
          
          foreach ($lists as $list): ?>

          <div class="list_card" >
            <div>
              <?php $listID = ($list['listID']); ?>
              <!-- Use title as link to the specific list, give the listID to link -->
              <a class="title" href="oneList.php?listID=<?= $listID; ?>"><?=$list['title'];?></a>
              <p class="descript"><?=$list['description'];?></p>
            </div>   
            <div class="list_options">
              <!-- Delete list option -->
              <a href="index.php?listID=<?=$listID?>&crud=deleteList">X</a>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
        <?php 
          // IF user clicked on delete show delete.php
          if(isset($_GET['crud']) && $_GET['crud'] == 'deleteList') {
            
            require 'delete.php';

          } ?> 

          <!-- Option to add new list -->
          <div class="createNewList">
            <form action="index.php" method="POST">
              <select name="new_list" >
                <option value="" disabled selected>Create a new list</option>
                <option value="1">Gift List</option>
                <option value="2">Groceries</option>
                <option value="3">Event List</option>
                <option value="4">Dinner List</option>
                <option value="5">Dessert List</option>
                <option value="6">Decorations List</option>
                <option value="7">Custom List</option>
              </select>
              <button type="submit">Create</button>
            </form>
            <?php 
           
            if (isset($_POST['new_list'])) {
                if ($_POST['new_list'] == 7) {

                    require 'add.php';

                }else {

                    $checkListTitle = checkListTitleFromUser($_SESSION['user']['userID']);
                
                    if (empty($checkListTitle)) { ?>

                        <p class = "messageAlreadyExists">Creating list...</p>

                    <?php

                        addPredefinedList($_SESSION['user']['userID']);
                    
                            
                    } else { ?>
                    
                    <p class = "messageAlreadyExists">You already have a list with that name!</p>
                    
                    <?php }

            }} ?>
            <!-- Link to add a new list -->
            <!-- <a href="http://localhost/index.php?userID=<?=($_SESSION['user']['userID'])?>&crud=addList">Create new list</a> -->

            <?php
            // IF user clicked to add show add.php
            // if(isset($_GET['crud']) && $_GET['crud'] == 'addList') {
              
            //     require 'add.php';

            // } ?>
          </div>  
      </section>
    </div>   
    <div>
      <!-- Add footer to show back and logout buttons -->
      <?php require_once 'footer.php';?>
    </div>
  </div>

</body>
</html>