<?php session_start(); ?>

<?php
unset($_SESSION['username']);
unset($_SESSION['firstname']);
unset($_SESSION['lastname']);
unset($_SESSION['user_role']);
session_destroy();

header('Location: ../index.php');
?>