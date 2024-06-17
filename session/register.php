<?php
require 'db_connection.php';

if (isset($_POST['register_submit'])) {
    $userName = $_POST["userName"];
    $userEmail = $_POST["userEmail"];
    $userPassword = $_POST["userPassword"];
    $userPasswordConf = $_POST["userPasswordConf"];

    $hashed_password = password_hash($userPassword, PASSWORD_DEFAULT);

    // Check for duplicate username or email
    $stmt = $connection->prepare("SELECT * FROM user_data WHERE userName = ? OR userEmail = ?");
    $stmt->bind_param("ss", $userName, $userEmail);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<script>alert('Username or email has already been taken');</script>";
    } else {
        if ($userPassword === $userPasswordConf) {
            $hashedPassword = password_hash($userPassword, PASSWORD_DEFAULT);
            $stmt = $connection->prepare("INSERT INTO user_data (userName, userEmail, userPassword) VALUES(?, ?, ?)");
            $stmt->bind_param("sss", $userName, $userEmail, $hashedPassword);
            if ($stmt->execute()) {
                echo "<script>alert('Registration Successful');</script>";
                header("Location: index.php");
                exit();
            } else {
                echo "<script>alert('Registration Failed');</script>";
            }
        } else {
            echo "<script>alert('Passwords do not match');</script>";
        }
    }
}
?>
