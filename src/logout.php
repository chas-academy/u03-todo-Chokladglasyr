<?php
session_start();

require_once 'db.php';
dbConnect();
require_once 'crud_functions.php';

session_destroy();
header('Location: http://localhost')
?>
