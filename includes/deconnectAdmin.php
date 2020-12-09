<?php 
session_start();
unset($_SESSION['adminUsername']);
unset($_SESSION['adminId']);
session_destroy();
header('Location: ../admin.php');

?>