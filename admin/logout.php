<?php
session_start();
require_once 'auth.php';

// Logout admin
logoutAdmin();

// Redirect to login page
header('Location: login.php');
exit();
?>
