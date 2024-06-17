<?php
// Підключення до бази даних
include('db_connection.php');

// Отримання даних з POST-запиту
$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];
$workspace_type = $_POST['workspace_type'];

// SQL-запит для перевірки кількості записів для вказаного типу робочого місця у вказаний час
$sql = "SELECT COUNT(*) AS count FROM dt_event WHERE workspace_type = '$workspace_type' AND ((start_date BETWEEN '$start_date' AND '$end_date') OR (end_date BETWEEN '$start_date' AND '$end_date'))";

// Виконання SQL-запиту
$result = mysqli_query($conn, $sql);

// Отримання результату запиту
$row = mysqli_fetch_assoc($result);
$count = $row['count'];

// Перевірка кількості записів
if ($workspace_type == "personal-workspace" && $count >= 64) {
    echo "unavailable"; // Немає вільних місць
} elseif ($workspace_type == "Skyperoom" && $count >= 3) {
    echo "unavailable"; // Немає вільних місць
} elseif ($workspace_type == "meeting-room" && $count >= 4) {
    echo "unavailable"; // Немає вільних місць
} elseif ($workspace_type == "event-room" && $count >= 1) {
    echo "unavailable"; // Немає вільних місць
} else {
    echo "available"; // Є вільні місця
}

// Закриття підключення до бази даних
mysqli_close($conn);
?>
