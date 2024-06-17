<?php

// Підключення до бази даних
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "coworkingspace_db";

$conn = new mysqli($servername, $username, $password, $dbname);

// Перевірка з'єднання
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Обробка запиту Ajax
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] == 'load_data') {
    // Отримання відгуків з бази даних
    $sql = "SELECT * FROM review_table";
    $result = $conn->query($sql);

    $reviews = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $reviews[] = $row;
        }
    }

    // Відправлення даних в форматі JSON на фронтенд
    echo json_encode($reviews);
}

// Закриття з'єднання з базою даних
$conn->close();

?>