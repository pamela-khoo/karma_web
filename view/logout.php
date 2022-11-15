<?php
session_start();  
session_unset();    
session_destroy();  

echo '<script>alert("You are now logged out!");</script>';
header("Location:../index.php?action=admin-login");
?>