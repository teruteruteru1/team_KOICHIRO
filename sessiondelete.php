<?php 

session_start();
unset($_SESSION['plan']);
unset($_SESSION['edit']);
unset($_SESSION['add']);

header('Location: dialy_form.php');
exit();

 ?>