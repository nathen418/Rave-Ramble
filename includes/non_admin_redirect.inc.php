<?php
session_start();
include('./includes/signin_functions.inc.php');
if (!isset($_SESSION['user_id']) || $_SESSION['isAdmin'] != 1) {
    redirect_user();
}
?>