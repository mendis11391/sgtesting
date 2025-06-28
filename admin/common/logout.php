<?php
session_start();
unset($_SESSION['adusername']);
header('Location: ../index.php');
?>