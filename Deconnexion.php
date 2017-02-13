<?php
ob_start();
session_start();
session_unset();
session_destroy();
header("location: ActionAccueil.php");
ob_end_flush();
?>