<?php
// Démarrez la session
session_start();
$_SESSION['loggedin']=false;
header("Location: ../../../../login/login.php");
session_destroy();
exit;
?>