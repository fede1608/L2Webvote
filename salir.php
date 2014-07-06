<?php
session_start();
ini_set("display_errors", "OFF");
unset($_SESSION['login_admin']);
unset($_SESSION['senha_admin']);
session_destroy();
header("Location: index.php");
?>