<?php
session_start();
require 'configForAdmin.php';

if (isset($_POST['login_submit'])) {
    $loginAdminEmail = $_POST["adminEmail"];
    $loginAdminPassword = $_POST["adminPassword"];

    

    $stmt = $connection->prepare("SELECT * FROM admin_data WHERE adminEmail = ?");
    $stmt->bind_param("s", $loginAdminEmail);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($loginAdminPassword, $row["adminPassword"])) {
            $_SESSION["login"] = true;
            $_SESSION["id"] = $row["id"];
            echo "<script>alert('Successful');</script>";
            header("Location: update.php");
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