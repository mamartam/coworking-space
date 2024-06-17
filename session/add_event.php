<?php
session_start();
include('db_connection.php');



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Перевірка підключення до бази даних
    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $title = $_POST['title'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $workspace_type = $_POST['workspace_type'];
    $username = $_POST['username'];
    $userphone = $_POST['userphone'];
    $creator = $_POST['creator'];

    $query = "INSERT INTO dt_event (title, start_date, end_date, workspace_type, username, userphone, creator) VALUES ('$title', '$start_date', '$end_date', '$workspace_type', '$username', '$userphone', '$creator')";
    
    if (mysqli_query($connection, $query)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($connection);
    }

    mysqli_close($connection);
}
?>
