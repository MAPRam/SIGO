<?php
session_start();
session_destroy();
header("location: index.php");
exit();

  /*
  session_name("turnados");
  session_start();
  session_unset();
  $_SESSION = array();
  setcookie("turnado", '', 1);
  session_destroy();
  header("Location: index.php");
*/
?>
