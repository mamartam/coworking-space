<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "college_db";
$connection = mysqli_connect($server, $username, $password, $database);

if (!$connection) {
    die("Помилка підключення: " . mysqli_connect_error());
}

if (isset($_GET['id'])) {
    $eventId = $_GET['id'];

    $query = "SELECT * FROM dt_event WHERE id = $eventId";
    $result = mysqli_query($connection, $query);

    if (mysqli_num_rows($result) > 0) {
        $event = mysqli_fetch_assoc($result);
        echo json_encode($event);
    } else {
        echo json_encode(["error" => "Подія не знайдена"]);
    }
} else {
    echo json_encode(["error" => "Невірний запит"]);
}

mysqli_close($connection);
?>
