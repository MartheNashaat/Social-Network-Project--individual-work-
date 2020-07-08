<?php
session_start();
session_destroy();
header("location: login.php",  true,  301 );  exit;
?>
