<?php
session_start();
require 'db_connection.php'; // Ensure you have the correct database connection


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION['user_id'])) {
    $eventId = $_POST['eventId'];
    $title = $_POST['title'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $workspace_type = $_POST['workspace_type'];
    $username = $_POST['username'];
    $userphone = $_POST['userphone'];

    // Prepare the SQL statement to update the event
    $stmt = $connection->prepare("UPDATE dt_event SET title = ?, start_date = ?, end_date = ?, workspace_type = ?, username = ?, userphone = ? WHERE id = ? AND creator = ?");
    $stmt->bind_param("ssssssii", $title, $start_date, $end_date, $workspace_type, $username, $userphone, $eventId, $_SESSION['user_id']);

    if ($stmt->execute()) {
        echo "Event updated successfully.";
    } else {
        echo "Error updating event: " . $stmt->error;
    }

    $stmt->close();
    $connection->close();
} else {
    echo "Unauthorized access.";
}
?>
