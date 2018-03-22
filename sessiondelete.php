<?php 

session_start();
unset($_SESSION['plan']);
header('Location: dialy_form.php');
exit();

 ?>