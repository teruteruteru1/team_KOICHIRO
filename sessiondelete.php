<?php 

session_start();
unset($_SESSION['plan']);
unset($_SESSION['edit']);

header('Location: dialy_form.php');
exit();

 ?>