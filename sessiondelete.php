<?php 

session_start();
unset($_SESSION['plan']);
header('Location: mochimaru_plan_form.php');
exit();

 ?>