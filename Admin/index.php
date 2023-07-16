<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user'])) {
    // Redirect to the specific file
    header('Location:admin_login.php');
    exit;
} else {
    header('Location:CoolAdmin-master');
    exit;
}
