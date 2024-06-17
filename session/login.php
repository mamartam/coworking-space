<?php
session_start();
require 'db_connection.php';

if (isset($_POST['login_submit'])) {
    $loginUserEmail = $_POST["userEmail"];
    $loginUserPassword = $_POST["userPassword"];

    

    $stmt = $connection->prepare("SELECT * FROM user_data WHERE userEmail = ?");
    $stmt->bind_param("s", $loginUserEmail);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($loginUserPassword, $row["userPassword"])) {
            $_SESSION["login"] = true;
            $_SESSION["user_id"] = $row["user_id"];
            echo "<script>alert('Successful');</script>";
            header("Location: main.php");
            exit();
        } else {
            echo "<script>alert('Wrong password');</script>";
            // header("Location: index.php");
            // exit();
        }
    } else {
        echo "<script>alert('User not registered');</script>";
    }
}
?>


