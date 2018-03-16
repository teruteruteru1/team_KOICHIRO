<?php 

session_start();
unset($_SESSION['plan']);
header('Location: plan_form.php');
exit();

 ?>