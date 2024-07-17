<?php
require "conn.php";

try {
    // Prepare an insert statement
    $stmt = $mysqli->prepare("INSERT INTO event (name, location) VALUES (?, ?)");
    $stmt->bind_param("ss", $name, $location);

    // Set parameters and execute
    $name = $_REQUEST["name"];
    $location = $_REQUEST["location"];
    $stmt->execute();

    // Redirect to event page after successful insertion
    header('Location: event.php');
} catch (Exception $e) {
    $mysqli->rollback(); // Undo queries if error occurs
    throw $e;
}
?>
