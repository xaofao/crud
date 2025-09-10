<?php
session_start();
session_destroy();
unset($_SESSION['sms_login']);
unset($_SESSION['name']);
header("Location:login.php");
?>