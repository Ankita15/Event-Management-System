<?php
   session_start();
   unset($_SESSION["userid"]);
   header('Refresh: 2; URL = login.php');
?>