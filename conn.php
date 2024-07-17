<?php
    session_start();

    // Check if the user is authenticated
    if (!isset($_SESSION['user_id'])) {
        header('Location: login.php');
        exit;
    }

    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    try {
        $mysqli = new mysqli("localhost", "root", "", "oauth_example");
    } catch (Exception $e) {
        error_log($e->getMessage());
        exit('Error connecting to database');
    }
?>
