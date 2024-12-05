<?php

require_once 'db.php';
require 'crud_functions.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>test</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
   <section>
    <h2>Lists</h2>
    <div class = "list">    
        
        <?php $lists = getList($conn);

        foreach ($lists as $list): ?>

         <div>      

            <p><?php echo htmlspecialchars($list['title']);?></p>
            <p><?php echo htmlspecialchars($list['description']);?></p>

        </div>
  
        <?php endforeach; ?></div>

   </section> 
</body>
</html>