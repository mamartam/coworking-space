<?php
// Підключення до бази даних
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "college_db";

// Створення з'єднання
$conn = new mysqli($servername, $username, $password, $dbname);

// Перевірка з'єднання
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Запит до бази даних
$sql = "SELECT title, username FROM dt_event";
$result = $conn->query($sql);

// // Перевірка наявності результатів
// if ($result->num_rows > 0) {
//     // // Формування масиву з результатами
//     // $users = array();
//     // while ($row = $result->fetch_assoc()) {
//     //     $users[] = $row;
//     // }
//     // Виведення результатів у форматі JSON
//     // echo json_encode($users);
// } else {
//     echo "0 results";
// }
$conn->close();
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Display</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            background-color: #f9f9f9;
            padding: 10px;
            margin-bottom: 5px;
            border-radius: 3px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        li:hover {
            background-color: #e9e9e9;
        }
    </style>
</head>

<body>
    <div class="container">
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "college_db";

        // Створення з'єднання
        $conn = new mysqli($servername, $username, $password, $dbname);
        $result = mysqli_query($conn, "SELECT * FROM dt_event ORDER BY id");

        while ($row = mysqli_fetch_array($result)) {
            printf(
                "<p><a href='update.php?id=%s'>%s - %s</a></p><hr>",
                htmlspecialchars_decode($row["id"]),
                htmlspecialchars_decode($row["title"]),
                htmlspecialchars_decode($row["username"])
            );
        }
        ?>
    </div>

</body>

</html>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        // fetch('fetch_events.php')
            .then(response => response.json())
            .then(data => {
                const eventList = document.getElementById('eventList');
                data.forEach(event => {
                    const listItem = document.createElement('li');
                    // listItem.textContent = `<label>${event.title}</label> - ${event.username}`;
                    eventList.appendChild(listItem);
                });
            });
    });

</script>