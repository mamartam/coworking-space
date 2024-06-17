<?php
require 'configForAdmin.php';

if (isset($_POST['register_submit'])) {
    $adminName = $_POST["adminName"];
    $adminEmail = $_POST["adminEmail"];
    $adminPassword = $_POST["adminPassword"];
    $adminPasswordConf = $_POST["adminPasswordConf"];

    $hashed_password = password_hash($adminPassword, PASSWORD_DEFAULT);

    // Check for duplicate username or email
    $stmt = $connection->prepare("SELECT * FROM admin_data WHERE adminName = ? OR adminEmail = ?");
    $stmt->bind_param("ss", $adminName, $adminEmail);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<script>alert('adminName or email has already been taken');</script>";
    } else {
        if ($adminPassword === $adminPasswordConf) {
            $hashedPassword = password_hash($adminPassword, PASSWORD_DEFAULT);
            $stmt = $connection->prepare("INSERT INTO admin_data (adminName, adminEmail, adminPassword) VALUES(?, ?, ?)");
            $stmt->bind_param("sss", $adminName, $adminEmail, $hashedPassword);
            if ($stmt->execute()) {
                echo "<script>alert('Registration Successful');</script>";
                header("Location: loginForAdmin.php");
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