<?php
include('connection.php');

$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];
$workspace_type = $_POST['workspace_type'];

// Extract the date part from start_date and end_date
$start_date_only = date('Y-m-d', strtotime($start_date));
$end_date_only = date('Y-m-d', strtotime($end_date));

// Set the limits for each workspace type
$limits = [
    'event-room' => 1,
    'meeting-room' => 4,
    'Skyperoom' => 3,
    'personal-workspace' => 64
];

// Check the existing bookings count
$query = "SELECT COUNT(*) as count FROM dt_event 
          WHERE workspace_type = '$workspace_type' 
          AND DATE(start_date) = '$start_date_only'
          AND DATE(end_date) = '$end_date_only'";

$result = mysqli_query($connection, $query);
$row = mysqli_fetch_assoc($result);
$existing_count = $row['count'];

// Check if the limit is exceeded
if ($existing_count >= $limits[$workspace_type]) {
    echo 'unavailable';
} else {
    echo 'available';
}

mysqli_close($connection);
?>
