<?php
include('db_connection.php');

$query = "SELECT * FROM dt_event";
$result = mysqli_query($connection, $query);

$events = array();
while ($row = mysqli_fetch_assoc($result)) {
    $events[] = array(
        'id' => $row['id'],
        'title' => $row['title'],
        'start' => $row['start_date'],
        'end' => $row['end_date'],
        'workspace_type' => $row['workspace_type'],

        'username' => $row['username'],
        'userphone' => $row['userphone'],
        'creator' => $row['creator']
    );
}

echo json_encode($events);
?>
